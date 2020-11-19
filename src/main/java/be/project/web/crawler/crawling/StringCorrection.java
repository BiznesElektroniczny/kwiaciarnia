package be.project.web.crawler.crawling;

import lombok.NonNull;

import java.nio.charset.Charset;

public class StringCorrection {
    private final static byte FIRST_JSON_CHAR = '{';

    public static String fixSlashes(@NonNull final String s) {
        return s.replace("\\/", "/");
    }

    public static String removeBOM(@NonNull final String s, @NonNull final Charset charset) {
        final byte[] bytes = s.getBytes(charset);
        for (int i = 0; i < bytes.length; i++) {
            if (bytes[i] == FIRST_JSON_CHAR) {
                return new String(bytes, i, bytes.length - i, charset);
            }
        }
        return s;
    }
}
