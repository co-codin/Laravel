import hljs from 'highlight.js'

export default {
    deep: true,
    bind: (el, binding) => {
        let targets = el.querySelectorAll('code')

        targets.forEach((target) => {
            hljs.highlightBlock(target)
        })
    }
}