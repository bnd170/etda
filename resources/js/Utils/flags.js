
export const getFlagUrl = (isoCode, size) => {
    const flagSize = size || 80;
    return `https://flagcdn.com/w${flagSize}/${isoCode.toLowerCase()}.webp`;
};

