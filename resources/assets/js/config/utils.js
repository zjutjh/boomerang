/**
 * 页面到达底部，加载更多
 */
export const loadMore = (element, callback) => {
    let windowHeight = element.offsetHeight;
    let height = element.scrollHeight;
    // let setTop = element.scrollTop;
    let paddingBottom;
    let marginBottom;
    let requestFram;
    let oldScrollTop;

    element.addEventListener('scroll',() => {
        console.log(windowHeight)
        loadMore();
    }, false)
    //运动开始时获取元素 高度 和 offseTop, pading, margin
    element.addEventListener('touchstart',() => {
        height = element.scrollHeight;
        // setTop = element.scrollTop;
        // console.log(`${height}::${setTop}`)
        paddingBottom = getStyle(element,'paddingBottom');
        marginBottom = getStyle(element,'marginBottom');
    },{passive: true})

    //运动过程中保持监听 scrollTop 的值判断是否到达底部
    element.addEventListener('touchmove',() => {
        loadMore();
    },{passive: true})

    //运动结束时判断是否有惯性运动，惯性运动结束判断是非到达底部
    element.addEventListener('touchend',() => {
        oldScrollTop = element.scrollTop;
        moveEnd();
    },{passive: true})

    const moveEnd = () => {
        requestFram = requestAnimationFrame(() => {
            if (element.scrollTop != oldScrollTop) {
                oldScrollTop = element.scrollTop;
                loadMore();
                moveEnd();
            }else{
                cancelAnimationFrame(requestFram);
                //为了防止鼠标抬起时已经渲染好数据从而导致重获取数据，应该重新获取dom高度
                height = element.scrollHeight;
                loadMore();
            }
        })
    }


    const loadMore = () => {
        console.log(`${element.scrollTop + windowHeight}::::${height + paddingBottom + marginBottom}`)


        if (element.scrollTop + windowHeight >= height  + paddingBottom + marginBottom) {
            callback();
        }
    }
}

/**
 * 获取style样式
 */
export const getStyle = (element, attr, NumberMode = 'int') => {
    let target;
    // scrollTop 获取方式不同，没有它不属于style，而且只有document.body才能用
    if (attr === 'scrollTop') {
        target = element.scrollTop;
    }else if(element.currentStyle){
        target = element.currentStyle[attr];
    }else{
        target = document.defaultView.getComputedStyle(element,null)[attr];
    }
    //在获取 opactiy 时需要获取小数 parseFloat
    return  NumberMode == 'float'? parseFloat(target) : parseInt(target);
}