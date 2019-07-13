<template>
    <div>
        <div id="card-element" class="mb-2"></div>
        <div id="card-errors"></div>

        <input type="hidden" name="token" :value="token">
    </div>
</template>

<script>
    export default {
        mounted () {
            let stripe = Stripe('pk_test_o2qLuru9np9gu9tch9Vn3MtJ')
            let elements = stripe.elements()

            var card = elements.create('card', {
                style: {
                    base: {
                        fontSize: '14px',
                        color: '#32325d'
                    }
                }
            })

            card.addEventListener('change', (event) => {
                let displayError = document.getElementById('card-errors')

                
            })

            card.mount('#card-element')
        }
    }
</script>
