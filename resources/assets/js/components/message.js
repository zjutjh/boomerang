export default {
    install(Vue) {
        Vue.prototype.message = (msg, _time) => {
            let time = _time || 1000;
            const body = document.body
            const obj = document.getElementById('message')
            if (obj) {
                return false;
            }
            let ele = document.createElement("div")
            ele.innerHTML = msg;
            ele.setAttribute('id', 'message')
            body.appendChild(ele)
            ele.style.position = "fixed"
            ele.style.left = "50%"
            ele.style.top = "50%"
            ele.style.transform = "translate3d(-50%,-50%, 0)"
            ele.style.WebKitTranform = "translate3d(-50%,-50%, 0)"
            ele.style.fontSize = "0.24rem"
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