package be.project.web.crawler.products.categories;

import com.fasterxml.jackson.annotation.JsonIgnore;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.util.Set;
import java.util.TreeSet;

@Getter
@AllArgsConstructor
@NoArgsConstructor
public class CategoryNode {
    private int categoryId;
    private String categoryName;
    @Setter private String description;
    private int parentCategoryId;
    private final Set<Integer> children = new TreeSet<>(Integer::compareTo);

    @Setter @JsonIgnore
    private CategoryNode parent;

}
