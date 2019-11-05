let actions = {
    createCategory({commit}, category) {
        axios.post('/api/category', category)
            .then(res => {
                commit('CREATE_CATEGORY', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchCategories({commit}) {
        axios.get('/api/category/')
            .then(res => {
                commit('FETCH_CATEGORIES', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteCategory({commit}, category) {
        axios.delete(`/api/category/${category.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_CATEGORY', category)
            }).catch(err => {
            console.log(err)
        })
    },

    createOption({commit}, option) {
        axios.post('/api/option', option)
            .then(res => {
                commit('CREATE_OPTION', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchOptions({commit}) {
        axios.get('/api/option')
            .then(res => {
                commit('FETCH_OPTIONS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteOption({commit}, option) {
        axios.delete(`/api/option/${option.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_OPTION', option)
            }).catch(err => {
            console.log(err)
        })
    },

    createOptionValue({commit}, value) {
        axios.post('/api/option-value', value)
            .then(res => {
                commit('CREATE_OPTION_VALUE', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchOptionValues({commit}) {
        axios.get('/api/option-value')
            .then(res => {
                commit('FETCH_OPTIONS_VALUES', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteOptionValue({commit}, value) {
        axios.delete(`/api/option-value/${value.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_OPTION_VALUE', value)
            }).catch(err => {
            console.log(err)
        })
    },

    createProduct({commit}, product) {
        axios.post('/api/product', product)
            .then(res => {
                commit('CREATE_PRODUCT', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchProducts({commit}) {
        axios.get('/api/product')
            .then(res => {
                commit('FETCH_PRODUCTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteProduct({commit}, product) {
        axios.delete(`/api/product/${product.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_PRODUCT', product)
            }).catch(err => {
            console.log(err)
        })
    },

    createProductOption({commit}, productOption) {
        axios.post('/api/product-option', productOption)
            .then(res => {
                commit('CREATE_PRODUCT_OPTION', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchProductOptions({commit}) {
        axios.get('/api/product-option')
            .then(res => {
                commit('FETCH_PRODUCT_OPTIONS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteProductOption({commit}, product, option) {
        axios.delete(`/api/product-option/${product.id}`, option)
            .then(res => {
                if (res.data === 'ok')
                commit('FETCH_PRODUCT_OPTIONS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

    createCombination({commit}, combination) {
        axios.post('/api/product-combination', combination)
            .then(res => {
                commit('CREATE_COMBINATION', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchCombinations({commit}) {
        axios.get('/api/product-combination')
            .then(res => {
                commit('FETCH_COMBINATIONS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteCombination({commit}, combination) {
        axios.delete(`/api/product-combination/${combination.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_COMBINATION', combination)
            }).catch(err => {
            console.log(err)
        })
    },

    fetchCombinationValues({commit}, combination) {
        axios.get(`/api/product-combination-value/${combination}`)
            .then(res => {
                commit('FETCH_COMBINATION_VALUES', res.data)
            }).catch(err => {
            console.log(err)
        })
    },

   
}

export default actions