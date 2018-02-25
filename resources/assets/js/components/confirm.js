export default {
    install(Vue) {
        Vue.prototype.jhconfirm = (option) => {
            const _option = option || {}
            const ele = document.createElement('div')
            const modal = document.createElement('div')
            modal.className = 'v-modal'
            const {
                title,
                success
            } = option
            ele.className = 'confirm'
            const template = `
       
            <div class="confirm-header">提示</div>
            <div class="confirm-title">${title}</div>
            <div class="confirm-btns">
                <div class="confirm-btn-cancel" id="confirm-cancel">取消</div>
                <div class="confirm-btn-confirm" id="confirm-btn-confirm">确认</div>
            </div>
      
            `;
            ele.innerHTML = template
            document.body.appendChild(modal)
            document.body.appendChild(ele)

            const confirm_ele = document.getElementById("confirm-btn-confirm");
            const cancel_ele = document.getElementById("confirm-cancel");
            confirm_ele.addEventListener('click', successCallback(success))
            cancel_ele.addEventListener('click', cancel)
            function successCallback(callback) {
                function eventCallback() {
                    callback()
                    document.body.removeChild(ele)
                    document.body.removeChild(modal)
                    document.removeEventListener('click', eventCallback)
                }
                return eventCallback;
            }

            function cancel() {
                document.body.removeChild(ele)
                document.body.removeChild(modal)
                //document.removeEventListener('click', eventCallback)
            }


        }
    }
}