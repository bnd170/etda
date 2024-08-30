
export const getFlagUrl = (isoCode, size) => {
    const flagSize = size || 64;
    return `https://flagsapi.com/${isoCode.toUpperCase()}/flat/${flagSize}.png`;
};

