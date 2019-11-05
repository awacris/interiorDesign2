
 let mutations = {
    CREATE_CATEGORY(state, category) {
        state.categories.unshift(category)
    },
    FETCH_CATEGORIES(state, categories) {
        return state.categories = categories
    },
    DELETE_CATEGORY(state, category) {
        let index = state.categories.findIndex(item => item.id === category.id)
        state.categories.splice(index, 1)
    },

    CREATE_OPTION(state, option) {
        state.options.unshift(option)
    },
    FETCH_OPTIONS(state, options) {
        return state.options = options
    },
    DELETE_OPTION(state, option) {
        let index = state.options.findIndex(item => item.id === option.id)
        state.options.splice(index, 1)
    },

    CREATE_OPTION_VALUE(state, value) {
        state.optionValues.unshift(value)
    },
    FETCH_OPTIONS_VALUES(state, values) {
        return state.optionValues = values
    },
    DELETE_OPTION_VALUE(state, value) {
        let index = state.optionValues.findIndex(item => item.id === value.id)
        state.optionValues.splice(index, 1)
    },

    CREATE_PRODUCT(state, product) {
        state.products.unshift(product)
    },
    FETCH_PRODUCTS(state, products) {
        return state.products = products
    },
    DELETE_PRODUCT(state, product) {
        let index = state.products.findIndex(item => item.id === product.id)
        state.products.splice(index, 1)
    },

    CREATE_PRODUCT_OPTION(state, product_option) {
        state.productOptions.unshift(product_option)
    },
    FETCH_PRODUCT_OPTIONS(state, product_options) {
        return state.productOptions = product_options
    },
    DELETE_PRODUCT_OPTION(state, product_option) {
        let index = state.productOptions.findIndex(item => item.id === product_option.id)
        state.productOptions.splice(index, 1)
    },

    CREATE_COMBINATION(state, combination) {
        state.combinations.unshift(combination)
    },
    FETCH_COMBINATIONS(state, combinations) {
        return state.combinations = combinations
    },
    DELETE_COMBINATION(state, combination) {
        let index = state.combinations.findIndex(item => item.id === combination.id)
        state.combinations.splice(index, 1)
    },
    FETCH_COMBINATION_VALUES(state, combinationValues) {
        return state.combinationValues = combinationValues
    },

}
export default mutations