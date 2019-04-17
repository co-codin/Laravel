import pluralize from 'pluralize'

export default {
    methods: {
        pluralize (singular, count) {
            return pluralize(singular, count)
        }
    }
}
