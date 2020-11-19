package be.project.web.crawler.main;

import be.project.web.crawler.crawling.WebsiteAnalyser;
import be.project.web.crawler.products.AttributeGroup;
import be.project.web.crawler.products.ListOfProductsFilter;
import be.project.web.crawler.products.Product;
import be.project.web.crawler.products.categories.DirectedGraph;
import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.ObjectMapper;
import org.apache.commons.io.FileUtils;

import java.io.File;
import java.io.IOException;
import java.nio.file.Path;
import java.text.MessageFormat;
import java.util.*;

public class Main {
    public final static String IMG_DIR_NAME = "img";
    public final static Path OUTPUT_DIR_PATH = new File("BE-output-files").toPath();
    //public final static Path OUTPUT_DIR_PATH = new File("C:\\OneDrive\\BE-output-files").toPath();
    public final static Path IMG_DIR_PATH = OUTPUT_DIR_PATH.resolve(IMG_DIR_NAME);
    public final static List<Path> DIRS = Arrays.asList(OUTPUT_DIR_PATH, IMG_DIR_PATH);
    public final static File PRODUCTS_FILE = OUTPUT_DIR_PATH.resolve("products.json").toFile();
    public final static File ATTRIBUTES_FILE = OUTPUT_DIR_PATH.resolve("attributes.json").toFile();
    public final static File CATEGORIES_FILE = OUTPUT_DIR_PATH.resolve("categories.json").toFile();

    public final static boolean DOWNLOAD_ALL_IMAGES = false;
    // public final static boolean DOWNLOAD_ALL_IMAGES = true;

    /**
     * READ_FROM_FILE = true    =>  file
     * READ_FROM_FILE = false   =>  download data
     */
    public final static boolean READ_PRODUCTS_FROM_FILE = true;
    // public final static boolean READ_PRODUCTS_FROM_FILE = false;


    public static void main(String[] args) throws Exception {
        final long start = System.currentTimeMillis();
        List<Product> products;
        if (!READ_PRODUCTS_FROM_FILE) {
            DIRS.stream().map(Path::toFile).filter(File::exists).forEach(f -> {
                try {
                    FileUtils.deleteDirectory(f);
                } catch (IOException e) {
                    e.printStackTrace();
                    System.exit(1);
                }
            });
            DIRS.stream().map(Path::toFile).filter(f -> !f.exists()).forEach(File::mkdir);
            products = WebsiteAnalyser.crawlParseExtractTransform();
            System.out.println();
            if (DOWNLOAD_ALL_IMAGES) {
                final List<Product> toRemove = Collections.synchronizedList(new ArrayList<>());
                products.stream().parallel().forEach(product -> {
                    try {
                        product.downloadImages();
                    } catch (IOException e) {
                        synchronized (toRemove) {
                            toRemove.add(product);
                            product.getDownloadedImages().stream()
                                    .filter(Objects::nonNull)
                                    .filter(File::exists)
                                    .forEach(File::delete);
                        }
                    } catch (Exception e) {
                        e.printStackTrace();
                        System.exit(1);
                    }
                });
                products.removeAll(toRemove);
            }

            AttributeGroup.generateAttributesFile(ATTRIBUTES_FILE, products);

            final DirectedGraph dg = DirectedGraph.load();
            dg.deleteUnusedNodes(products);
            DirectedGraph.save(dg);

            new ObjectMapper()
                    .writerWithDefaultPrettyPrinter()
                    .writeValue(PRODUCTS_FILE, products);
        } else {
            products = new ObjectMapper().readValue(PRODUCTS_FILE,
                    new TypeReference<List<Product>>() {
                    });
            
            //products.stream().map(Product::getUrlProdName).forEach(System.out::println);
            final ListOfProductsFilter filter = new ListOfProductsFilter(products);
            //final List<Product> byCategoryId = filter.getByCategoryId(0);
            //System.out.println("Unique field: " + filter.isFieldUnique(Product::getCatalogNum));
            //System.out.println();
            List<Product> reducedPrice = filter.reducedPrice();
            filter.openInBrowser(reducedPrice);
        }

        final long end = System.currentTimeMillis();
        System.out.println();
        System.out.println(MessageFormat.format("Time: {0} ms", end - start));
        System.out.println(MessageFormat.format("Valid products: {0}", products.size()));
    }
}
