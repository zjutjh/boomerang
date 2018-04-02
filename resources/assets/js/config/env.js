const env = process.env.NODE_ENV || 'production'
const debug = env !== 'production'
let api_url = ''
if (debug) {
      api_url = "http://localhost:3000"
} else {
      api_url = "https://boomerang.zhutianyu.top"
}

export {
    api_url
}


