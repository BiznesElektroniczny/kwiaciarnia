package be.project.web.crawler.products;

import lombok.AllArgsConstructor;
import lombok.NonNull;

import java.awt.*;
import java.io.IOException;
import java.net.URISyntaxException;
import java.util.List;
import java.util.TreeSet;
import java.util.function.Function;
import java.util.stream.Collectors;

@AllArgsConstructor
public class ListOfProductsFilter {
    private final static int OPEN_IN_BROWSER_LIMIT = 30;
    private final List<Product> products;

    public boolean isFieldUnique(@NonNull final Function<Product, String> getter) {
        final TreeSet<String> set = new TreeSet<>();
        int setSize = 0;
        for (final Product p : this.products) {
            set.add(getter.apply(p));
            if (setSize == set.size()) {
                System.out.println("Collision: id = " + p.getProductId());
            }
            setSize = set.size();
        }
        return this.products.size() == set.size();
    }

    public List<Product> reducedPrice() {
        return products.stream()
                .filter(product -> product
                        .getPrices()
                        .getPricesMap()
                        .values()
                        .stream()
                        .anyMatch(pp -> pp.getOldPrice() != null))
                .collect(Collectors.toList());
    }

    public List<Product> getByCategoryId(final int categoryId) {
        return products.stream()
                .filter(product -> product.getCategoryId() == categoryId)
                .collect(Collectors.toList());
    }
    
    public List<Product> getByName(@NonNull final String regex) {
        return products.stream()
                .filter(product -> product.getName().matches(regex))
                .collect(Collectors.toList());
    }

    public void openInBrowser(@NonNull final List<Product> list) throws Exception {
        if (Desktop.isDesktopSupported() && Desktop.getDesktop().isSupported(Desktop.Action.BROWSE)) {
            int counter = 0;
            for (Product p : list) {
                if (counter > OPEN_IN_BROWSER_LIMIT) break;
                try {
                    Desktop.getDesktop().browse(p.getProdURL().toURI());
                    counter++;
                } catch (IOException | URISyntaxException e) {
                    e.printStackTrace();
                    System.exit(1);
                }
            }
        } else {
            throw new Exception("browser: action not supported");
        }
    }
}
