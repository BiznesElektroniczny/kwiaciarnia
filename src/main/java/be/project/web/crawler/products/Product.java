package be.project.web.crawler.products;

import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import lombok.*;
import org.apache.commons.io.FilenameUtils;

import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.math.BigDecimal;
import java.math.RoundingMode;
import java.net.URL;
import java.nio.file.Files;
import java.util.*;
import java.util.function.Supplier;
import java.util.stream.Collectors;
import java.util.stream.Stream;

import static be.project.web.crawler.main.Main.IMG_DIR_PATH;
import static java.text.MessageFormat.format;

@Getter
@Setter
@NoArgsConstructor(access = AccessLevel.PUBLIC)
@AllArgsConstructor(access = AccessLevel.PUBLIC)
@Builder
@JsonIgnoreProperties(value = {"downloadedImages"})
public class Product {
    private int productId;
    private int categoryId;
    private int maxAmount;
    private int minAmount;
    private String name;
    private String urlProdName;
    private URL prodURL;
    private String catalogNum; // "nr katalogowy"
    private BigDecimal vat;
    private String vatName;
    private String description1;
    private String description2;
    private String description3;
    private String description4;
    private boolean hasAttributes;
    private Prices prices = new Prices();
    private final List<URL> imageURLs = new ArrayList<>();
    @JsonIgnore private transient final List<File> downloadedImages = new ArrayList<>();

    public void setHasAttributes() {
        this.hasAttributes = this.prices.getGroupSize() > 1;
    }

    public boolean hasAttributes() {
        return hasAttributes;
    }

    public void downloadImages() throws IOException {

        for (final URL url : this.imageURLs) {
            final String oldImgName = new File(url.getFile()).getName();
            final String ext = FilenameUtils.getExtension(
                    new File(url.getFile()).getAbsolutePath());
            String newName = oldImgName
                    .replaceAll("[^\\d]", " ")
                    .trim()
                    .replace(" ", "\n");
            newName = String.valueOf(new Scanner(newName).nextInt());
            newName = format("{0}.{1}", newName, ext);

            try (final InputStream in = url.openStream()) {
                final File img = IMG_DIR_PATH.resolve(newName).toFile();
                System.out.println(img.getName());
                Files.copy(in, img.toPath());
                downloadedImages.add(img);
            }
        }
    }

    public static int roundValScale() {
        return 6;
    }

    public static RoundingMode roundingMode() {
        return RoundingMode.HALF_UP;
    }

    public static BigDecimal roundVal(@NonNull final BigDecimal bd) {
        return bd.setScale(roundValScale(), roundingMode());
    }

//    public static class MyFileSerializer extends JsonSerializer<File> {
//
//        @Override
//        public void serialize(File file,
//                              JsonGenerator jsonGenerator,
//                              SerializerProvider serializerProvider) throws IOException {
//            jsonGenerator.writeObject(OUTPUT_DIR_PATH.relativize(file.toPath()).toString());
//        }
//    }

    @NoArgsConstructor
    public static class Prices {
        @Getter @Setter private int groupId = 0;
        @Setter @Getter private BigDecimal basePrice;
        @Getter private final LinkedHashMap<String, PriceInfo> pricesMap = new LinkedHashMap<>();

        @JsonIgnore
        public BigDecimal calcFinalPrice(final int amount, @NonNull final String priceKey) {
            final BigDecimal a = BigDecimal.valueOf(amount);
            final PriceInfo pair = pricesMap.getOrDefault(priceKey, null);
            BigDecimal p = BigDecimal.ZERO;
            if (pair != null) {
                p = pair.getOldPrice() != null
                        ? pair.getOldPrice()
                        : pair.getNewPrice();
            }
            return basePrice.add(pair == null ? BigDecimal.ZERO : p.multiply(a));
        }

        @JsonIgnore
        public String getGroupName() {
            return getGroup().collect(Collectors.joining(", "));
        }

        @JsonIgnore
        public int getGroupSize() {
            return Math.toIntExact(getGroup().count());
        }

        @JsonIgnore
        public List<String> getGroupElements() {
            return getGroup().collect(Collectors.toList());
        }

        @JsonIgnore
        private Stream<String> getGroup() {
            return pricesMap.values()
                    .stream()
                    .map(Product.PriceInfo::getLabel);
        }
    }

    @Getter
    @Setter
    @NoArgsConstructor
    public static class PriceInfo {
        private final static Random RAND = new Random();
        private final static Supplier<Integer> quantitySupplier =
                () -> 40 + RAND.nextInt(81);
        private String label;
        private BigDecimal oldPrice;
        private BigDecimal newPrice;
        private final int quantity = quantitySupplier.get();

        public PriceInfo(@NonNull final String label, @NonNull final BigDecimal newPrice) {
            this.label = label;
            this.oldPrice = null;
            this.newPrice = newPrice;
        }

        public PriceInfo(@NonNull final String label, @NonNull final BigDecimal newPrice, final BigDecimal oldPrice) {
            if (oldPrice != null && oldPrice.compareTo(newPrice) == 0) {
                this.oldPrice = null;
            } else {
                this.oldPrice = oldPrice;
            }
            this.label = label;
            this.newPrice = newPrice;
        }
    }
}
