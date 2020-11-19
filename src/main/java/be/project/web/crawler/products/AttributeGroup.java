package be.project.web.crawler.products;

import com.fasterxml.jackson.databind.ObjectMapper;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NonNull;

import java.io.File;
import java.io.IOException;
import java.util.*;
import java.util.concurrent.atomic.AtomicInteger;

@Getter
@AllArgsConstructor
public class AttributeGroup {
    private final int groupId;
    private final String groupName;
    private final Map<Integer, String> attributes = new TreeMap<>();

    public static void generateAttributesFile(@NonNull final File file,
                                              @NonNull final List<Product> products) throws IOException {

        final AtomicInteger groupId = new AtomicInteger(0);
        final AtomicInteger attribId = new AtomicInteger(0);
        final List<AttributeGroup> groups = new ArrayList<>();

        products.stream()
                .filter(Product::hasAttributes)
                .forEach(p -> {
                    AttributeGroup newGroup;
                    final Optional<AttributeGroup> optional = groups
                            .stream()
                            .filter(g -> g.groupName.equals(p.getPrices().getGroupName()))
                            .findFirst();
                    if (!optional.isPresent()) {
                        newGroup = new AttributeGroup(
                                groupId.incrementAndGet(),
                                p.getPrices().getGroupName()
                        );
                        p.getPrices().getGroupElements().forEach(label -> {
                            newGroup.getAttributes().put(
                                    attribId.incrementAndGet(),
                                    label
                            );
                        });
                        groups.add(newGroup);
                    } else {
                        newGroup = optional.get();
                    }
                    p.getPrices().setGroupId(newGroup.getGroupId());
                });

        new ObjectMapper()
                .writerWithDefaultPrettyPrinter()
                .writeValue(file, groups);
    }
}
