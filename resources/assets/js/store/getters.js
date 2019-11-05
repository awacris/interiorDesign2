
let getters = {
    categories: state => {
        return state.categories
    },
    options: state => {
        return state.options
    },

    optionValues: state => {
        return state.optionValues
    },

    products: state => {
        return state.products
    },

    productoptions: state => {
        return state.productOptions
    },

    combinations: state => {
        return state.combinations
    },

    combinationValues: state => {
        return state.combinationValues
    }

}

export default  getters