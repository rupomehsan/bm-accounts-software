function number_format(number) {
    return new Intl.NumberFormat().format(number)
}

window.number_format = number_format;
