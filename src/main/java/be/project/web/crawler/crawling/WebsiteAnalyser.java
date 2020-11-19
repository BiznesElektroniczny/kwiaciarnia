package be.project.web.crawler.crawling;

import be.project.web.crawler.products.Product;
import be.project.web.crawler.products.Vat;
import be.project.web.crawler.products.categories.DirectedGraph;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.fasterxml.jackson.databind.SerializationFeature;
import com.fasterxml.jackson.databind.node.ArrayNode;
import com.fasterxml.jackson.databind.node.JsonNodeType;
import lombok.NonNull;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.math.BigDecimal;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.Charset;
import java.nio.charset.StandardCharsets;
import java.text.MessageFormat;
import java.util.*;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;
import java.util.function.BiFunction;
import java.util.function.Function;
import java.util.stream.Stream;

import static be.project.web.crawler.crawling.StringCorrection.fixSlashes;
import static be.project.web.crawler.crawling.StringCorrection.removeBOM;
import static org.jsoup.parser.Parser.unescapeEntities;

public class WebsiteAnalyser {
    public final static Charset CHARSET = StandardCharsets.UTF_8;
    public final static String WEBSITE_URL = "https://www.kwiatowaprzesylka.pl/";
    public final static String WEBSITE_URL_2 = "https://www.kwiatowaprzesylka.pl";
    public final static String WEBSITE_PRODUCT_URL_FORM = "https://www.kwiatowaprzesylka.pl/#!/product_details/%d/%s";
    public final static String WEBSITE_REQUEST_URL = "https://www.kwiatowaprzesylka.pl/data/product_details/data.php";
    public final static String CATEGORIES_SRC_URL = "https://www.kwiatowaprzesylka.pl/data/products/categories.php";
    public final static String DETAILS_OBJ_KEY = "details";
    public final static String PROD_ID_KEY = "productid";
    public final static String CATEGORY_ID_KEY = "categorieid";
    public final static String MAX_AMOUNT_KEY = "max_amount";
    public final static String MIN_AMOUNT_KEY = "min_amount";
    public final static String NAME_KEY = "name";
    public final static String PROD_URL_NAME = "friendly_name";
    public final static String CATALOG_NUM_KEY = "catalog_number";
    public final static String VAT_KEY = "vat";
    public final static String DESCRIPTION_1_KEY = "description";
    public final static String DESCRIPTION_2_KEY = "description2";
    public final static String DESCRIPTION_3_KEY = "description3";
    public final static String DESCRIPTION_4_KEY = "description4";
    public final static String IMG_ARR_KEY = "pictures";
    public final static String IMG_KEY = "pic3";
    public final static String PRICES_ARR_KEY = "prices_arr";
    public final static String PRICES_ARR_NEW_PRICE_KEY = "price";
    public final static String PRICES_ARR_OLD_PRICE_KEY = "price_old";
    public final static String PRICES_ARR_NAME_KEY = "name";
    public final static String BASE_PRICE_KEY = "price";
    //public final static String _KEY = "";
    public final static int PRICE_LIST_SIZE_LIMIT = 4;
    public final static int NUMBER_OF_THREADS_IN_THE_POOL = 10;
    public final static int CONNECTION_CONNECT_TIMEOUT = 16000;
    public final static int CONNECTION_READ_TIMEOUT = 16000;
    public final static int MAX_PROD_ID = 1500;
    public final static int MIN_PROD_ID = 100;
    public final static int PROD_NUM = 500;

    private synchronized static boolean isResponseGood(JsonNode jsonNode) {
        if (jsonNode == null) return false;
        if (!jsonNode.has(DETAILS_OBJ_KEY)) return false;
        if (!jsonNode.get(DETAILS_OBJ_KEY).getNodeType().equals(JsonNodeType.OBJECT)) return false;
        final JsonNode detailsObj = jsonNode.get(DETAILS_OBJ_KEY);
        if (!detailsObj.has(PROD_ID_KEY)) return false;
        return detailsObj.has(CATEGORY_ID_KEY);
    }

    public static List<Product> crawlParseExtractTransform() throws Exception {

        final List<Product> productSyncList = Collections.synchronizedList(new ArrayList<>());
        //final List<WebsiteProduct> webProdSyncList = Collections.synchronizedList(new ArrayList<>());
        final ExecutorService threadPool = Executors.newFixedThreadPool(NUMBER_OF_THREADS_IN_THE_POOL);

        int id = MIN_PROD_ID - 1;
        while (true) {
            synchronized (productSyncList) {
                if (id >= MAX_PROD_ID || productSyncList.size() >= PROD_NUM) break;
            }
            final int finalId = id;
            id++;
            final Runnable r = () -> {
                try {
                    final Function<Integer, Boolean> prodData = (integer) -> (integer != MIN_PROD_ID - 1);

                    System.out.println(MessageFormat.format("Product ID = {0}", finalId));
                    synchronized (productSyncList) {
                        if (productSyncList.size() >= PROD_NUM) return;
                    }

                    final HttpURLConnection connection = (HttpURLConnection)
                            new URL(prodData.apply(finalId) ? WEBSITE_REQUEST_URL : CATEGORIES_SRC_URL)
                                    .openConnection();

                    byte[] requestBodyBytes = new byte[0];
                    if (prodData.apply(finalId)) {
                        final String requestBody = getRequestBody(finalId);
                        requestBodyBytes = requestBody.getBytes(CHARSET.toString().toLowerCase());
                    }

                    connection.setRequestMethod("POST");
                    connection.setRequestProperty("Content-Type", "application/json;charset=utf-8");
                    connection.setRequestProperty("Accept", "application/json, text/plain, */*");
                    connection.setRequestProperty("Pragma", "no-cache");
                    connection.setRequestProperty("Expires", "Thu, 10 Nov 2000 01:00:00 GMT");
                    if (prodData.apply(finalId)) {
                        connection.setRequestProperty("Content-Length", String.valueOf(requestBodyBytes.length));
                    }
                    connection.setRequestProperty("Connection", "keep-alive");
                    connection.setRequestProperty("Cache-Control", "max-age=0");
                    connection.setRequestProperty("Origin", "https://www.kwiatowaprzesylka.pl");
                    connection.setRequestProperty("Referer", "https://www.kwiatowaprzesylka.pl/");
                    connection.setRequestProperty("Host", "www.kwiatowaprzesylka.pl");
                    connection.setRequestProperty("User-Agent", "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101");
                    connection.setDoOutput(true);

                    if (prodData.apply(finalId)) {
                        try (final OutputStream os = connection.getOutputStream()) {
                            os.write(requestBodyBytes, 0, requestBodyBytes.length);
                        }
                    }

                    connection.setConnectTimeout(CONNECTION_CONNECT_TIMEOUT);
                    connection.setReadTimeout(CONNECTION_READ_TIMEOUT);

                    if (connection.getResponseCode() != HttpURLConnection.HTTP_OK) {
                        throw new Exception("response: "
                                + connection.getResponseCode()
                                + " " + connection.getResponseMessage());
                    }

                    try (InputStreamReader isr = new InputStreamReader(connection.getInputStream(), CHARSET);
                         BufferedReader br = new BufferedReader(isr)) {
                        String line;
                        String s = "";
                        while ((line = br.readLine()) != null) {
                            s += line;
                        }
                        connection.disconnect();

                        final ObjectMapper mapper = new ObjectMapper();
                        mapper.configure(SerializationFeature.INDENT_OUTPUT, true);
                        final JsonNode tree = mapper.readTree(fixSlashes(removeBOM(s, StandardCharsets.UTF_8)));
                        if (prodData.apply(finalId)) {
                            if (!isResponseGood(tree)) return;
                        } else {
                            new Thread(() -> DirectedGraph.generate(tree)).start();
                            return;
                        }

                        synchronized (productSyncList) {
                            final Product p = extractData(tree);
                            if (p != null) {
                                p.getPrices().setBasePrice(
                                        Vat.excludeTax(p.getPrices().getBasePrice(), p.getVat())
                                );
                                p.getPrices().getPricesMap().forEach((key, priceInfo) -> {
                                    if (priceInfo.getOldPrice() != null) {
                                        priceInfo.setOldPrice(
                                                Vat.excludeTax(priceInfo.getOldPrice(), p.getVat())
                                        );
                                    }
                                    if (priceInfo.getNewPrice() != null) {
                                        priceInfo.setNewPrice(
                                                Vat.excludeTax(priceInfo.getNewPrice(), p.getVat())
                                        );
                                    }
                                });
                                productSyncList.add(p);
                            }
                        }
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                    System.exit(1);
                }
            };
            threadPool.submit(r);
        }

        threadPool.shutdown();
        threadPool.awaitTermination(PROD_NUM * CONNECTION_CONNECT_TIMEOUT, TimeUnit.MILLISECONDS);

        return productSyncList;
    }

    private static String getRequestBody(final int id) throws JsonProcessingException {
        final Map<String, String> parameters = new HashMap<>();
        parameters.put("productid", String.valueOf(id));
        //parameters.put("search_name", "");
        //parameters.put("selected_filters", "{}");
        return new ObjectMapper().writeValueAsString(parameters);
    }

    private synchronized static Product extractData(@NonNull final JsonNode rootNode) {
        try {
            Product prod = new Product();
            {
                final JsonNode details = rootNode.get(DETAILS_OBJ_KEY);
                prod.setProductId(Integer.parseInt(details.get(PROD_ID_KEY).textValue()));
                prod.setCategoryId(Integer.parseInt(details.get(CATEGORY_ID_KEY).textValue()));
                prod.setMinAmount(details.get(MIN_AMOUNT_KEY).intValue());
                prod.setMaxAmount(details.get(MAX_AMOUNT_KEY).intValue());
                prod.setCatalogNum(details.get(CATALOG_NUM_KEY).textValue());
                prod.setName(details.get(NAME_KEY).textValue());
                prod.setUrlProdName(details.get(PROD_URL_NAME).textValue());
                //  "prodURL" : "https://www.kwiatowaprzesylka.pl",
                {
                    final URL url = new URL(
                            String.format(WEBSITE_PRODUCT_URL_FORM,
                                    prod.getProductId(),
                                    details.get(PROD_URL_NAME).textValue())
                    );
                    if (url.equals(new URL(WEBSITE_URL)) || url.equals(new URL(WEBSITE_URL_2))) {
                        return null;
                    }
                    prod.setProdURL(url);
                }

                prod.setDescription1(details.get(DESCRIPTION_1_KEY).textValue());
                prod.setDescription2(details.get(DESCRIPTION_2_KEY).textValue());
                prod.setDescription3(details.get(DESCRIPTION_3_KEY).textValue());
                prod.setDescription4(details.get(DESCRIPTION_4_KEY).textValue());
                if (Stream.of(prod.getDescription1(), prod.getDescription2(),
                        prod.getDescription3(), prod.getDescription4())
                        .allMatch(str -> str == null || str.trim().length() < 1)) {
                    return null;
                }
                prod.setDescription1(unescapeEntities(prod.getDescription1(), true));
                prod.setDescription2(unescapeEntities(prod.getDescription2(), true));
                prod.setDescription3(unescapeEntities(prod.getDescription3(), true));
                prod.setDescription4(unescapeEntities(prod.getDescription4(), true));
                if (Stream.of(prod.getDescription1(), prod.getDescription2(), prod.getDescription3())
                        .anyMatch(string -> string == null || string.length() < 1)) {
                    return null;
                }

                final ArrayNode images = (ArrayNode) rootNode.get(IMG_ARR_KEY);
                for (int i = 0; images != null && i < images.size(); i++) {
                    final JsonNode node = images.get(i);
                    if (node.has(IMG_KEY)) {
                        prod.getImageURLs().add(new URL(WEBSITE_URL + node.get(IMG_KEY).textValue()));
                    }
                }
                if (prod.getImageURLs().size() < 1) return null;

                prod.getPrices().setBasePrice(
                        Product.roundVal(new BigDecimal(details.get(BASE_PRICE_KEY).textValue()))
                );
                final BigDecimal vat = Product.roundVal(new BigDecimal(details.get(VAT_KEY).textValue()));
                if (vat.compareTo(BigDecimal.ZERO) > 0) {
                    final Optional<Vat> optional = Vat.decimalToEnum(vat);
                    if (optional.isPresent()) {
                        prod.setVat(optional.get().getRate());
                        prod.setVatName(optional.get().getName());
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            }
            {
                final BiFunction<String, JsonNode, BigDecimal> parsePriceString =
                        (s, n) -> Product.roundVal(new BigDecimal(n.get(s).textValue()));
                final ArrayNode pricesArr = (ArrayNode) rootNode.get(PRICES_ARR_KEY);
                for (int i = 0; pricesArr != null && i < pricesArr.size(); i++) {
                    final JsonNode node = pricesArr.get(i);
                    Product.PriceInfo priceInfo;
                    @NonNull final String pairName = node.get(PRICES_ARR_NAME_KEY).textValue();
                    if (node.has(PRICES_ARR_OLD_PRICE_KEY)) {
                        priceInfo = new Product.PriceInfo(
                                pairName,
                                parsePriceString.apply(PRICES_ARR_NEW_PRICE_KEY, node),
                                parsePriceString.apply(PRICES_ARR_OLD_PRICE_KEY, node)
                        );
                    } else {
                        priceInfo = new Product.PriceInfo(
                                pairName,
                                parsePriceString.apply(PRICES_ARR_NEW_PRICE_KEY, node)
                        );
                    }
                    prod.getPrices().getPricesMap().put(pairName, priceInfo);
                }
            }
            if (prod.getPrices().getPricesMap().size() > PRICE_LIST_SIZE_LIMIT) {
                return null;
            }
            if (prod.getPrices().getBasePrice().compareTo(BigDecimal.ZERO) != 0) {
                return null;
            }
            prod.setHasAttributes();
            if (!prod.hasAttributes() && prod
                    .getPrices()
                    .getPricesMap()
                    .values()
                    .stream()
                    .anyMatch(pp -> pp.getOldPrice() != null)) {
                return null;
            }
            return prod;
        } catch (Exception e) {
            //e.printStackTrace();
            return null;
        }
    }
}
