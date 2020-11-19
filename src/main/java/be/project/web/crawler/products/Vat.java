package be.project.web.crawler.products;

import lombok.AccessLevel;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NonNull;

import java.math.BigDecimal;
import java.math.RoundingMode;
import java.util.Arrays;
import java.util.Optional;

@Getter
@AllArgsConstructor(access = AccessLevel.PRIVATE)
public enum Vat {
    PTU_23(
            "PTU PL 23%",
            BigDecimal.valueOf(23.00)
    ),
    PTU_08(
            "PTU PL 8%",
            BigDecimal.valueOf(8.00)
    );

    private final String name;
    private final BigDecimal rate;

    public static BigDecimal excludeTax(@NonNull final BigDecimal value, @NonNull final BigDecimal rate) {
        final BigDecimal vat = rate.add(BigDecimal.valueOf(100))
                .divide(BigDecimal.valueOf(100), Product.roundValScale(), Product.roundingMode());
        return value.divide(vat, RoundingMode.HALF_UP);
    }

    public static Optional<Vat> decimalToEnum(@NonNull final BigDecimal d) {
        return Arrays.stream(Vat.values())
                .filter(vat -> vat.rate.compareTo(d) == 0)
                .findFirst();
    }
}
