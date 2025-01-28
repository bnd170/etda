
export const getImage = (image, size) => {
    const flagSize = size || 80;

    // Check if image is an url
    if (image.startsWith('http')) {
        return image;
    }

    return `https://flagcdn.com/w${flagSize}/${image.toLowerCase()}.webp`;
};

