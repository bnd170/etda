const formatDate = (sourceDate, options) => {
    const date = new Date(sourceDate);
    console.log(date);
    return new Intl.DateTimeFormat('es-ES', options).format(date);
};

export { formatDate };
