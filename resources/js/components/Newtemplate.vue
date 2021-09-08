<template>
<div class="content flex justify-center">
  <div class="irb mt-1 right-0 bg-transparent w-screen">
    <h1 class="m-3 text-4xl">Template Creation</h1>
    <p class="text-xl">Start creating your brand new template by following the 4 easy steps </p>
    <form @submit.prevent="addNewTemplate" method="POST">
        <div class="mx-auto sm:px-6 lg:px-8">
            <p class="text-lg">Write the name for your template :</p>
            <div class="irbu1 border border-gray-200 border-opacity-75 rounded-lg w-15 mt-3 flex items-center mb-3">
                <svg class="w-6 h-6 ml-2"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <input v-model="Name" required class="irbu -ml-8 pl-10 focus:outline-none w-full bg-transparent text-base" style="appearance:none;" @input="handlefirstInput($event.target.value)" type="text" placeholder="Template Name ...">
                <br>
            </div>
        </div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <p class="text-lg">Select the template Category :</p>
            <div v-if="categoryin =='Buzzevents'" class="irbu1 border border-gray-200 border-opacity-75 rounded-lg w-15 mt-3 flex items-center mb-3">
                <svg  class="w-6 h-6 ml-2"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                </svg>
                <select class="irbu -ml-8 pl-10 border-none focus:outline-none w-full bg-transparent text-base" v-model="Category" @input="handlesecondInput($event.target.value)" required> 
                    <option value="Événements en ligne" selected>Événements en ligne</option>
                    <option value="Expositions virtuelles">Expositions virtuelles</option>
                    <option value="Webinaires">Webinaires</option>
                </select>
            </div> 
            <div v-else class="irbu1 border border-gray-200 border-opacity-75 rounded-lg w-15 mt-3 flex items-center mb-3">
                <svg  class="w-6 h-6 ml-2"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                </svg>
                <select class="irbu -ml-8 pl-10 border-none	focus:outline-none w-full bg-transparent text-base" v-model="Category" @input="handlesecondInput($event.target.value)" required>
                    <option value="CDI/CDD" selected>CDI/CDD</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Stage">Stage</option>
                </select>
            </div> 
            <br>
        </div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <p class="text-lg">Enter image link below :</p>
            <div class="irbu1 border border-gray-200 border-opacity-75 rounded-lg w-15 mt-3 flex items-center mb-3">
                <svg class="w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <input v-model="image" required class="irbu -ml-8 pl-10 focus:outline-none w-full bg-transparent text-base" style="appearance:none;" @input="handlethirdInput($event.target.value)" type="text" placeholder="Image link ..." >
                <br>
            </div>
        </div>
        <div class="pt-4">
            <!--Modal-->
           <transition name="fade" appear>
            <div class="modal-overlay " v-if="showModalC" >
                <div class="static h-screen w-full absolute flex items-center justify-center bg-modal p-3 " style="overflow: hidden;">
                    <div class="relative bg-white rounded shadow p-8 m-4 max-w-full h-full text-center overflow-y-scroll w-screen" style="height: 100%; overflow-y: hidden;">
                        <svg @click="showModalC = false" class="absolute w-7 h-7 left-1 top-1" style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <div style="width: 100% !important; display:flex; justify-content:center;">
                            <div style="width: 100% !important; display:flex; justify-content:center;">
                                <input type="submit" class="focus:outline-none text-white text-sm py-2.5 mx-3 px-3 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center flex items-center"  value="Save Template">
                            </div>
                            <div style="width: 100% !important; display:flex; justify-content:center;">
                                <input @click="usetemp" type="submit" class="focus:outline-none text-white text-sm py-2.5 mx-3 px-3 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center flex items-center"  value="Save and use Template">
                            </div>
                        </div>
                        <EmailEditor ref="emailEditor" class="unlayer-editor" v-on:load="editorLoaded"/>
                    </div>
                </div>
            </div>
            </transition>
            <!---->
        </div>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <p class="text-xl" style="color:gray">Start creating your template now with our editor.</p>
                <a data-toggle="modal" data-target="#Themechoice">
                    <input type="button" @click="test" class="mb-4 bg-blue hover:bg-blue-600 bg-blue-500 text-white font-bold mt-2 mb-1 py-2 px-4 border-b-4 rounded" value="Create Now !" >
                </a>
            </div>
        </div>
    </form>
</div>
</div>
</template>
<script>
    import axios from 'axios';
    import { EmailEditor } from 'vue-email-editor';
    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';
    var FileSaver = require('file-saver');
    export default {
        components: {
            Hooper,
            Slide
        },
        data(){
            return{
                carouselData: 0,
                Templates:undefined,
                firstinputData:null,
                firstinputData:null,
                hasImage: false,
                showModalC:false,
                templateDesign:null,
                templateHtml:null,
                categoryin:null,
            }
        },
        methods: {
            test(){
                if(!this.Category=='' && !this.Name=='' && !this.image=='')
                {
                    this.showModalC=true
                }
                else
                {
                    alert("All fields are required");
                }
            },
            usetemp(){
                setTimeout(()=>{
                    window.location.replace("https://okynewslettersdemo.000webhostapp.com/Templateeditor");
                },1000)
            },
            addNewTemplate(){
                this.$refs.emailEditor.editor.exportHtml(
                (data) => {
                    this.templateDesign=JSON.stringify(data.design);
                    this.templateHtml=data.html;
                    localStorage.Json= this.templateDesign;
                    localStorage.code= this.templateHtml;
                }
                )
                this.savetodatabase();
            },
            savetodatabase(){
                setTimeout(function () {
                    axios.post('/post',{Name: localStorage.Name, Category: localStorage.Category, image: localStorage.image, Json: localStorage.Json, type: localStorage.type, code: localStorage.code})
                    .then((response)=>{
                        console.log(response)
                    })
                    .catch(error => {
                        console.log("ERRRR:: ",error.response.data);
                    })
                }, 1000);
            },
            handlefirstInput(value){
                localStorage.Name=value;
            },
            handlesecondInput(value){
                localStorage.Category=value;
            },
            handlethirdInput(value){
                localStorage.image=value;
            },
            editorLoaded() {
                this.$refs.emailEditor.editor.loadDesign(JSON.parse(localStorage.getItem('Json')));
            },
            saveDesign() {
                this.$refs.emailEditor.editor.saveDesign(
                (design) => {
                    console.log('saveDesign', design);
                }
                )
            },
            exportHtml() {
                this.$refs.emailEditor.editor.exportHtml(
                (data) => {
                    this.templateDesign=data.design;
                    this.templateHtml=data.html;
                    console.log(this.templateDesign)
                    console.log(this.templateHtml)
                }
                )
            }

        },
        mounted() {
            this.categoryin=localStorage.type
        }

    }
</script>
<style>
.irbu1{
    border-radius: 20px !important;
    margin:0rem 25rem;
}

.content{
    justify-content:center !important;
    text-align:center!important;
    font-weight:600
}
p{
color:black;
}
.imagePreviewWrapper {
    width: 250px;
    height: 250px;

    cursor: pointer;

}
.unlayer-editor{
    margin-bottom:1rem
}
.btnr{
    background-color:#45c0ef;
}
.linear-wipe {
font-size:2.5rem;
  background: linear-gradient(to right, #c6ecfa 20%, #5bc8f1 30%, #49c1ef 70%, #03a5ea 80%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  background-size: 200% auto;
  animation: textShine 7s ease-in-out infinite alternate;
}

@keyframes textShine {
  to {
    background-position: 200%;
  }
  }
.text-lg{
color:gray;
}
.stack{
    top:10%;
    width:6rem !important;
}
</style>
