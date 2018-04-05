<template>

    <div class="edit-wrap">
        <div class="form clearfix select">
            <div class="form-item">
                <label for="" class="item-label">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:</label>
                <input @click="selectClick" v-model="data.type" type="text" class="item-content" readonly="readonly">
                <span class="select-suffix" @click="selectClick"><i class="el-icon-arrow-down suffix-caret"
                                                                    :class="{ 'is_reverse' : isReverse_1}"></i></span>
                <div class="select-dropdown-wrap" v-show="isReverse_1">
                    <ul class="select-dropdown">
                        <li v-for="(item, index) in select" @click="selectChange(index)">{{item}}</li>
                    </ul>
                </div>
            </div>

            <div class="form-item input">
                <label for="" class="item-label">名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:</label>
                <input type="text" class="item-content" v-model="data.name" placeholder="如：校园卡">
            </div>

            <div class="form-item input">
                <label for="" class="item-label">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点:</label>
                <input type="text" class="item-content" v-model="data.place" placeholder="如：广b二楼通道">
            </div>
            <div class="form-item input" v-show="showId">
                <label for="" class="item-label">丢失校园卡学号:</label>
                <input type="text" class="item-content" v-model="data.stuid" placeholder="如：2016xxxxxxxx">
            </div>

            <div class="form-item select select-2">
                <label for="" class="item-label">联系方式:</label>
                <input @click="selectClick1" v-model="select2[data.contact_type]" type="text" class="item-content"
                       readonly="readonly">
                <input type="text" class="item-content-2" v-model="data.contact">
                <span class="select-suffix" @click="selectClick1"><i class="el-icon-arrow-down suffix-caret"
                                                                     :class="{ 'is_reverse' : isReverse_2}"></i></span>
                <div class="select-dropdown-wrap" v-show="isReverse_2">
                    <ul class="select-dropdown">
                        <li v-for="(item, index) in select2" @click="selectChange1(index)">{{item}}</li>
                    </ul>
                </div>
            </div>

            <div class="form-item other">
                <label for="" class="item-label">其他详情描述:</label>
                <textarea name="" id="" rows="6" class="item-textarea" v-model="data.description"></textarea>
            </div>

            <div class="img-list">
                <div class="img-item" v-for="(item, index) in img">
                    <img :src="item.url" alt="">
                    <span class="img-delete" @click="deleteImg(index)"><i class="el-icon-circle-close"></i></span>
                </div>
            </div>

            <div class="form-button">
                <el-upload
                        class="upload-wrap"
                        action=""
                        :on-remove="handleRemove"
                        multiple

                        :auto-upload="false"
                        :accept="accept"
                        :limit="4"
                        :on-change="fileChange"
                        :show-file-list="false"
                >
                    <button class="upload-button" @click="selectImg">上传图片</button>
                </el-upload>
                <button class="release" @click="release">点击发布</button>
            </div>
        </div>

        <el-dialog :visible.sync="dialogVisible">
            <img width="100%" :src="dialogImageUrl" alt="">
        </el-dialog>


    </div>


</template>

<script>

    import state from '../../components/state.mixin'
    import {api_url} from "../../config/env";

    import vHead from '../../components/Header.vue';
    export default {
        name: "upload",
        mixins: [state],
        data() {
            return {
                dialogImageUrl: '',
                dialogVisible: false,
                data: {
                    type: '失物招领',
                    name: '',
                    place: '',
                    contact_type: 0,
                    contact: '',
                    description: '',
                    stuid: '',
                    lost_type: 0
                },
                select: [
                    '失物招领',
                    '寻物启事',
                    '校园卡招领'
                ],
                select2: [
                    '电话号码',
                    'QQ'
                ],
                isReverse_1: false,
                isReverse_2: false,
                img: [],
                accept: 'image/*',
                showId: false

            };
        },
        components:{
            vHead,
        },
        methods: {
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                this.dialogVisible = true;
            },
            selectClick() {
                this.isReverse_1 = !this.isReverse_1;
            },
            selectClick1() {
                this.isReverse_2 = !this.isReverse_2;
            },
            selectChange(index) {
                console.log(index);
                this.data.lost_type = index
                if (index == 2) {
                    this.showId = true
                } else {
                    this.showId = false
                }
                this.data.type = this.select[index];
                this.isReverse_1 = false;
            },
            selectChange1(index) {
                this.data.contact_type = index;
                this.isReverse_2 = false;
            },
            selectImg() {
                console.log(this.$refs.upload)
            },
            fileChange(file, filelist) {
                console.log(file)
                //file.url = file.url.split('').slice(5).join('')


                this.img.push(file)
                console.log(this.img)
            },
            deleteImg(index) {
                // this.message('test', 'el-icon-check', 1000)

                this.jhconfirm({
                    title: '你确定移除这张图片嘛？',
                    success: () => {
                        this.img.splice(index, 1)
                        this.message('移除成功', 'el-icon-check')

                    }
                })
            },
            release() {
                if (!this.data.name || !this.data.place || !this.data.contact || !this.data.description) {
                    this.message('不能为空', 'el-icon-warning')
                    return
                }
                if (this.data.type === '校园卡招领') {
                    if (!this.data.stuid)
                        this.message('不能为空', 'el-icon-warning');
                    if (!/[0-9]{12}/.test(this.data.stuid)) {
                        this.message('学号格式不正确', 'el-icon-warning', 1000)
                    }
                    return
                }

                this.message('正在发布中,请稍等', 'el-icon-loading')
                const params = {
                    'uid': this.getUser().id,
                    'title': this.data.name,
                    'description': this.data.description,
                    'lost_place': this.data.place,
                    'contact_uno': !this.data.stuid ? -1 : this.data.stuid,
                    'phone': (this.data.contact_type === 0) ? this.data.contact : '',
                    'qq': (this.data.contact_type === 1) ? this.data.contact : '',
                    'lost_type': this.data.lost_type
                }

                const header = {
                    'Authorization': "bearer " + this.getToken()
                }
                this.$http.post(api_url, {
                    data: params
                }).then(res => {
                    if (res.data.code > 0) {

                        this.message('正在上传图片,请稍等', 'el-icon-loading')

                        this.uploadImg(res.item.id, 'el-icon-loading')

                    }
                }).catch(error => {
                    console.log(error)
                })




            },
            async uploadImg(item_id) {
                await this.img.map(item => {
                    this.transformFile(item, item_id);
                })

                this.message('发布完成', 'el-icon-check')


            },
            transformFile(file, item_id) {
                const imgFile = file;
                const id = item_id;
                const img = new Image();

                img.src = file.url;
                img.onload =  () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.width = img.width;
                    canvas.height = img.height;

                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    let tmp_img = canvas.toDataURL(imgFile.raw.type, 0.5);
                    const binaryString = window.atob(tmp_img.split(',')[1]);
                    const arrayBuffer = new ArrayBuffer(binaryString.length);
                    const intArray = new Uint8Array(arrayBuffer);
                    for (let i = 0, j = binaryString.length; i < j; i++) {
                        intArray[i] = binaryString.charCodeAt(i);
                    }
                    const fileDate = [intArray];
                    let blob;

                    blob = new Blob(fileDate, {type: imgFile.raw.type});
                    console.log(blob)
                    const formData = new FormData();
                    formData.append('item_id', id);
                    formData.append('file', blob, imgFile.name);

                    const header = {
                        'Authorization': "bearer " + this.getToken()
                    }

                    this.$http.post('/create', {
                        data: formData
                    }).then(res => {

                    }).catch(error => {
                        console.log(error)
                    })


                }

            }
        }
    }
</script>

<style>
    .edit-wrap {
        width: 27.73rem;
        height: auto;
        margin: 0 auto;
        background: #fff;
        -webkit-border-radius: 3%;
        -moz-border-radius: 3%;
        border-radius: .4rem;
    }

    .edit-wrap:before {
        content: '';
        display: table;
    }

    .none {
        display: none;
    }

    .edit-wrap .form {
        width: 23.21rem;
        margin: 0 auto;
        margin-top: 1.28rem;

    }

    .form .form-item {
        margin-bottom: .256rem;
    }

    .form-item .item-label {
        text-align: right;
        vertical-align: middle;
        float: left;
        font-size: 1.024rem;
        color: #177441;
    }

    .item-content {
        margin-left: .768rem;

    }

    .form-item > input {
        border: 2px solid #177441;
        border-radius: .426rem;
        height: 1.536rem;
        line-height: 1.536rem;
        color: #177441;
        padding-left: .597rem;
        font-size: 1.024rem;
        cursor: pointer;

    }

    input {
        margin: 0em;
        background: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: none;
        text-rendering: auto;
        letter-spacing: normal;
        word-spacing: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        text-align: start;
    }

    input:hover {
        outline: none;
    }

    .select {
        position: relative;
    }

    .select .item-content {
        width: 6.402rem;
    }

    .select .select-suffix {
        position: absolute;
        left: 10.7rem;
        top: .2rem;

    }

    .select .select-suffix .suffix-caret.is_reverse {
        transform: rotate(0deg);
    }

    .select .select-suffix .suffix-caret {
        color: #177441;
        font-size: 1.024rem;
        transition: transform .3s;
        transform: rotate(180deg);
        cursor: pointer;

    }

    .select-dropdown-wrap {
        position: absolute;
        width: 6.402rem;
        border: 2px solid #177441;
        border-radius: .426rem;
        z-index: 10000;
        left: 5.377rem;
        color: #177441;
        text-align: center;
        background: #fff;
        cursor: pointer;
    }

    .select-2 .item-content-2 {
        width: 6.4rem;
    }

    .select-dropdown-wrap ul {
        list-style: none;
    }

    .input .item-content {
        width: 13.8711rem;
    }

    .other {
        margin-top: 2.56rem;
    }

    .item-textarea {
        width: 22.92rem;
        padding: .256rem;
        font-size: 1.024rem;
        color: #177441;
        border: 2px solid #177441;
        border-radius: .426rem;
        margin-top: 1.11rem;
    }

    textarea {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        text-shadow: none;
        outline: none;
        border: none;
    }

    textarea:hover {
        outline: none;
    }

    .img-list {
        width: 22.92rem;
        margin: 0 auto;
        margin-top: 1.365rem;
        min-height: 4.61rem;

    }

    .img-list > .img-item {
        width: 4.61rem;
        height: 4.61rem;
        border-radius: .426rem;
        margin-left: .9rem;
        background: #e5e5e5;
        display: inline-block;
        position: relative;
    }

    .img-list > .img-item > img {
        width: 100%;
        height: 100%;
        border-radius: .426rem;
    }

    .img-item .img-delete {
        position: absolute;
        right: 0;
        top: 0;
        font-size: 1.365rem;
    }

    .form-button {
        width: 22.023rem;
        margin: 0 auto;
        margin-top: 2.56rem;

    }

    .upload-button {
        padding: 0.512rem 1.62rem;
        background: #177441;
        border-radius: .5rem;
        font-size: 1.422rem;
        color: #fff;
        float: left;
    }

    .upload-wrap {
        display: inline-block;
    }

    .upload-wrap .el-upload--text {
        height: auto;
        width: auto;

    }

    .release {
        padding: 0.512rem 1.62rem;
        background: #177441;
        border-radius: .5rem;
        font-size: 1.422rem;
        color: #fff;
        float: right;
    }

    .clearfix:after {
        content: '';
        display: block;
        clear: both;
        overflow: hidden;
    }


</style>