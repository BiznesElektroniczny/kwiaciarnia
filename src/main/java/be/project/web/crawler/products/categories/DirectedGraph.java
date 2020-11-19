package be.project.web.crawler.products.categories;

import be.project.web.crawler.products.Product;
import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.NonNull;

import java.io.IOException;
import java.util.*;
import java.util.function.Predicate;

import static be.project.web.crawler.main.Main.CATEGORIES_FILE;

@Getter
@NoArgsConstructor
public class DirectedGraph {
    private final static String PARENT_ID_KEY = "parentid";
    private final static String NAME_ID_KEY = "name";
    private final static String DESCRIPTION_KEY = "description";

    private final Map<Integer, CategoryNode> allNodes = new TreeMap<>(Integer::compareTo);
    private final Map<Integer, List<Integer>> routes = new TreeMap<>(Integer::compareTo);
    private final Set<Integer> roots = new TreeSet<>(Integer::compareTo);
    private final List<List<Integer>> order = new ArrayList<>();

    public synchronized static void generate(@NonNull final JsonNode tree) {
        try {
            final DirectedGraph dg = new DirectedGraph();

            final Iterator<Map.Entry<String, JsonNode>> fields = tree.fields();
            while (fields.hasNext()) {
                final Map.Entry<String, JsonNode> node = fields.next();
                final CategoryNode newNode = new CategoryNode(
                        Integer.parseInt(node.getKey()),
                        node.getValue().get(NAME_ID_KEY).textValue(),
                        node.getValue().get(DESCRIPTION_KEY).textValue(),
                        Integer.parseInt(node.getValue().get(PARENT_ID_KEY).textValue()),
                        null
                );
                if (newNode.getDescription().toLowerCase().contains("<img")
                        || newNode.getDescription().toLowerCase().contains("<a")) {
                    newNode.setDescription("");
                }
                dg.getAllNodes().put(newNode.getCategoryId(), newNode);
            }

            {
                for (final Integer integer : dg.getAllNodes().keySet()) {
                    for (final Integer value : dg.getAllNodes().keySet()) {
                        final CategoryNode x = dg.getAllNodes().get(integer);
                        if (x.getParent() != null) break;
                        else {
                            final CategoryNode y = dg.getAllNodes().get(value);
                            if (y.getCategoryId() == x.getParentCategoryId()) {
                                x.setParent(y);
                                y.getChildren().add(x.getCategoryId());
                                break;
                            }
                        }
                    }
                }
                for (final Integer integer : dg.getAllNodes().keySet()) {
                    CategoryNode x = dg.getAllNodes().get(integer);
                    while (x.getParent() != null) x = x.getParent();
                    dg.getRoots().add(x.getCategoryId());
                }
                for (final Integer integer : dg.getAllNodes().keySet()) {
                    final CategoryNode categoryNode = dg.getAllNodes().get(integer);
                    dg.getRoutes().put(categoryNode.getCategoryId(), new ArrayList<>());
                    final List<Integer> list = dg.getRoutes().get(categoryNode.getCategoryId());
                    CategoryNode x = categoryNode;
                    while (x != null) {
                        list.add(x.getCategoryId());
                        x = x.getParent();
                    }
                }
            }

            DirectedGraph.save(dg);
        } catch (Exception e) {
            e.printStackTrace();
            System.exit(1);
        }
    }

    public synchronized static void save(@NonNull final DirectedGraph dg) throws IOException {
        new ObjectMapper()
                .writerWithDefaultPrettyPrinter()
                .writeValue(CATEGORIES_FILE, dg);
    }

    public synchronized static DirectedGraph load() throws IOException {
        return new ObjectMapper().readValue(CATEGORIES_FILE,
                new TypeReference<DirectedGraph>() {
                });
    }

    public synchronized void deleteUnusedNodes(@NonNull final List<Product> products) {
        final Set<Integer> usedNodes = new TreeSet<>();
        products.stream()
                .filter(p -> p.getCategoryId() != 0)
                .forEach(p -> {
                    try {
                        Integer nodeId = this.getAllNodes().keySet()
                                .stream()
                                .filter(integer -> integer == p.getCategoryId())
                                .findFirst()
                                .orElseThrow(Exception::new);
                        while (nodeId != null) {
                            usedNodes.add(nodeId);
                            nodeId = this.getAllNodes().get(nodeId).getParent() != null
                                    ? (this.getAllNodes().get(nodeId).getParent().getCategoryId())
                                    : (null);
                        }
                    } catch (Exception e) {
                        e.printStackTrace();
                        System.exit(1);
                    }
                });
        final Predicate<Integer> predicate = integer -> !usedNodes.contains(integer);
        this.allNodes.keySet().removeIf(predicate);

        for (final Integer integer : this.allNodes.keySet())
            this.allNodes.get(integer).getChildren().removeIf(predicate);

        this.routes.keySet().removeIf(predicate);
        for (final Integer integer : this.allNodes.keySet())
            this.routes.get(integer).removeIf(predicate);

        this.roots.removeIf(predicate);

        {
            for (int i = 0; i < this.roots.size(); i++) {
                this.order.add(new ArrayList<>());
            }
            final Integer[] arr = this.roots.toArray(new Integer[0]);
            for (int i = 0; i < this.roots.size(); i++) {
                preorder(this.allNodes.get(arr[i]), this.allNodes, this.order.get(i));
            }
        }
    }

    /**
     * traversal of the category tree
     */
    private void preorder(final CategoryNode node,
                          @NonNull final Map<Integer, CategoryNode> all,
                          @NonNull final List<Integer> list) {
        if (node == null) return;
        list.add(node.getCategoryId());
        for (final Integer childId : node.getChildren()) {
            preorder(all.get(childId), all, list);
        }
    }
}
