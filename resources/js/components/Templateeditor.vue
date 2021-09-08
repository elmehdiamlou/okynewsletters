<template>
<div class="ip flex">
  <div class="irb mt-1 right-0 bg-transparent w-screen">
      <div style="width: 100% !important; display:flex; justify-content:center;">
        <button @click="goBack()" class="focus:outline-none text-white text-sm py-2.5 mx-3 px-3 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg flex items-center">
        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
        </svg>
        Back
        </button>
        <button class="focus:outline-none text-white text-sm py-2.5 mx-3 px-3 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center" v-on:click="exportHtml">
        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Download
        </button>
        <button v-on:click="showHtml" @click="showModalC=true" class="focus:outline-none text-white text-sm py-2.5 mx-3 px-3 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
            Show code HTML
        </button>
      </div>
      <transition name="fade" appear>
            <div class="modal-overlay" v-if="showModalC" >
                <div class="static h-screen w-full absolute flex items-center justify-center bg-modal p-5 " style="overflow: hidden;">
                    <div class="relative bg-white rounded shadow p-8 m-4 max-w-full h-full text-center overflow-y-scroll w-screen" style="height: 100%; overflow-y: hidden;">
                        <svg @click="showModalC = false" class="absolute w-7 h-7 left-1 top-1" style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <div class="w-full h-full">
                            <textarea class="w-full h-full" readonly :value="Exported"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
      <EmailEditor ref="emailEditor" class="unlayer-editor" v-on:load="editorLoaded"/>
 </div>
</div>
</template>
<script>
    import axios from 'axios';
    import { EmailEditor } from 'vue-email-editor';
    import { saveAs } from 'file-saver';
    var FileSaver = require('file-saver');
    export default {
        components: {
        },
        data(){
            return{
                Templates:undefined,
                Exported:null,
                showModalC:false,
            }
        },
        methods: {
            goBack(){
                let type = localStorage.getItem('type');
                if(type=="Buzzevent"){
                    window.location.replace("https://okynewslettersdemo.000webhostapp.com/buzzevents");
                }else {
                    window.location.replace("https://okynewslettersdemo.000webhostapp.com/itskills");
                }
            },
            showHtml() {
                this.$refs.emailEditor.editor.exportHtml(
                (data) => {
                    this.Exported = data.html;
                    console.log(this.Exported)
                }
                )       
                
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
                    var blob = new Blob([data.html], {type: "text/plain;charset=utf-8"});
                    FileSaver.saveAs(blob, "ExportedNewsletter.html");
                }
                )
            }
            }
        ,
        mounted() {

        }

    }
</script>
<style>
.unlayer-editor{
    margin-top: 10px !important;
    height:38rem !important;
    margin:0;
    padding:0!important;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity .5s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

</style>
