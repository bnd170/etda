
export const getImage = (image, size) => {
    const flagSize = size || 80;

    if (image.startsWith('http')) {
        return image;
    }

    return `https://flagcdn.com/w${flagSize}/${image.toLowerCase()}.webp`;
};

