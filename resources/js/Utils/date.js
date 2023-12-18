const formatDate = (sourceDate, options) => {
    const date = new Date(sourceDate);
    return new Intl.DateTimeFormat('es-ES', options).format(date);
};

export { formatDate };
