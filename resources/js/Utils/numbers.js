
const statPercent = (stat, total) => {
    if (stat === 0) {
        return 0;
    }
    return Math.round((stat * 100) / total);
}

export { statPercent };
