export default {
    install(Vue) {
        Vue.prototype.message = (msg, icon, _time) => {
            let time = _time || 1000;
            const body = document.body
            const obj = document.getElementById('message')

            if (obj) {
                return false;
            }
            let ele = document.createElement("div")

            const template = `
                 <div class="message">
                 <div class="message-icon"><i class="${icon} icon-class"></i></div>
                 <div class="message-title">${msg}</div>
</div>
            `

            ele.innerHTML = template;
            body.appendChild(ele)
            setTimeout(function () {
                    body.removeChild(ele);
                    body.removeEventListener('click', preventDefault)
            }, time)


            function preventDefault() {
                var e = event || window.event
                if (e.preventDefault)
                    e.preventDefault();
                e.returnValue = false;
            }
        }

    }

}