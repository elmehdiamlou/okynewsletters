<template>

<div v-if="!isFetched">
    <div class="flex items-center">
    <svg class="justify-center" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(241, 242, 243, 0); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
    <circle cx="50" cy="50" fill="none" stroke="#07abcc" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
    </circle>
    </svg>
     </div>
</div>
<div v-else>
     <button @click="createNew()" class="focus:outline-none text-white text-sm mr-11 py-2.5 pr-2 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center float-right" >
            <svg class="w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Create New Template
        </button>
    <div class="irbu1 border border-gray-200 border-opacity-75 rounded-lg w-15 mt-3 flex items-center mb-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
        <input type="search" class="irbu -ml-8 pl-10 focus:outline-none w-full bg-transparent text-base" style="appearance:none;" v-model="search" placeholder="Search by name ...">
        
    </div>
    <div class="flex flex-wrap bg-white justify-center w-300  sm:rounded-lg bg-white overflow-hidden sm:rounded-lg shadow-2xl ml-3 mr-5 mt-2 mb-4">
            <div v-for="Template in filteredTemplates" :key="Template.id">
            <center >
            <div class="sm:px-20 bg-white max-w-20xl mx-10 sm:px-5 lg:px-5">
                <div class="my-10 ml-2">
                    <div class="w-45">
                        <div class="lg:-mx-10">
                            <article class="float-none overflow-hidden w-80 rounded-lg shadow-lg">
                                <img alt="Template_image" class="block w-full" style="height:9rem !important" :src="Template.image">
                            <header class="flex justify-between leading-tight p-2 md:p-4 justify-center text-c">
                                <h1 class="text-lg">
                                        {{Template.Name}}
                                </h1>
                                <h1 class="text-lg">
                                        {{Template.Category}}
                                </h1>
                            </header>
                            <footer class="relative flex items-center justify-between leading-none p-2 md:p-4 mb-1.5">
                                <a @click="showthisModal(Template.code,Template.Json)"  style="cursor:pointer" class="flex items-center no-underline hover:underline text-black">
                                    <svg width="24" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C17.5915 3 22.2898 6.82432 23.6219 12C22.2898 17.1757 17.5915 21 12 21C6.40848 21 1.71018 17.1757 0.378052 12C1.71018 6.82432 6.40848 3 12 3ZM12 19C7.52443 19 3.73132 16.0581 2.45723 12C3.73132 7.94186 7.52443 5 12 5C16.4756 5 20.2687 7.94186 21.5428 12C20.2687 16.0581 16.4756 19 12 19Z" fill="currentColor" /></svg>
                                </a>
                                <button @click="showsavelocalstorage(Template.Json)" class="flex no-underline hover: no-underline text-red-dark bg-blue hover:bg-blue-light text-white font-bold text-lg border-b-4 border-blue-dark hover:border-blue absolute bg-blue-500 rounded-lg px-1 py-1 transition duration-300 ease-in-out hover:bg-blue-600 right-3" >
                                    <span>Select</span>
                                </button>
                            </footer>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            </center>
            <!--CodeModal-->

           <transition name="fade" appear>
            <div class="modal-overlay " v-if="showModalC" >
                <div class="static h-screen w-full absolute flex items-center justify-center bg-modal p-5 " style="overflow: hidden;">
                    <div class="relative bg-white rounded shadow p-8 m-4 max-w-full h-full text-center overflow-y-scroll w-screen" style="height: 100%; overflow-y: hidden;">
                        <svg @click="showModalC = false" class="absolute w-7 h-7 left-1 top-1" style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <iframe :srcdoc="htmlCode" class="w-full h-full"></iframe>
                        <div style="width: 100% !important; display:flex; justify-content:center;">
                            <button @click="selectedTemplate()" class="flex no-underline hover: no-underline text-red-dark bg-blue hover:bg-blue-light text-white font-bold text-lg border-b-4 border-blue-dark hover:border-blue absolute bg-blue-500 rounded-lg px-1 py-1 transition duration-300 ease-in-out hover:bg-blue-600 bottom-2 w-25 align-center justify-center" >
                                <center><span>Select</span></center>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </transition>

            <!---->
            <!--SelectModal-->

           <transition name="fade" appear>
            <div class="modal-overlay " v-if="showModalS" >
                <div class="static h-screen w-full absolute flex items-center justify-center bg-modal p-5 " style="overflow: hidden;">
                    <div class="relative bg-white rounded shadow p-8 m-4 max-w-full h-full text-center overflow-y-scroll w-screen" style="height: 100%; overflow-y: hidden;">
                        <svg @click="showModalS= false" class="absolute w-7 h-7 left-1 top-1" style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <div v-if="OffersisFetched" class="flex flex-wrap bg-white justify-center w-full h-full sm:rounded-lg bg-white overflow-hidden sm:rounded-lg shadow-2xl mb-3">
                            <button @click="confirmselection()" class="flex no-underline hover: no-underline text-red-dark hover:bg-blue-light text-white font-bold text-lg hover:border-blue absolute bg-blue-500 rounded-lg px-1 py-1 transition duration-300 ease-in-out hover:bg-blue-600 right-10 mt-2" >
                                <span>Confirm Selection</span>
                            </button>
                            <div class="irbu1 max-h-10 border border-gray-200 border-opacity-75 rounded-lg w-75 mt-3 flex items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                                <input type="search" class="irbu max-h-10 -ml-8 pl-10 focus:outline-none w-full bg-transparent text-base" style="appearance:none;" v-model="searchoffer" placeholder="Search by name ...">
                            </div>
                            <div v-for="Offer in filteredOffers" :key="Offer.id" >
                               <center >
                                    <div class="sm:px-20 bg-white max-w-20xl mx-10 sm:px-5 lg:px-5">
                                        <div class="my-10 ml-2">
                                            <div class="w-45">
                                                <div class="lg:-mx-10">
                                                    <article class="float-none overflow-hidden w-80 rounded-lg shadow-lg">
                                                        <img alt="Template_image" class="block w-full" style="height:9rem !important" :src="Offer.logo">
                                                    <header class="flex justify-between leading-tight p-2 md:p-4 justify-center text-c">
                                                        <h1 class="text-lg">
                                                                {{Offer.name}}
                                                        </h1>
                                                        <h1 class="text-lg">
                                                                {{Offer.Category}}
                                                        </h1>
                                                    </header>
                                                    <footer class="relative flex leading-none p-2 md:p-4 mb-4">
                                                        <select v-model="Offer.id">
                                                            <option value="H">Horizontal</option>
                                                            <option value="V">Vertical</option>
                                                        </select>                                                    
                                                    </footer>
                                                    <footer class="relative flex items-center justify-between leading-none p-2 md:p-4 mb-4">
                                                        <vb-switch type="success" size="large" v-model="value" @change="change(Offer.id,Offer.name,Offer.color,Offer.pic,Offer.date_pub,Offer.postuler_avant)"/>                                                 
                                                    </footer>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <div style="width: 100% !important; display:flex; justify-content:center;">
                            <button @click="gotoRoute()" class="flex no-underline hover: no-underline text-red-dark bg-blue hover:bg-blue-light text-white font-bold text-lg border-b-4 border-blue-dark hover:border-blue absolute bg-blue-500 rounded-lg px-1 py-1 transition duration-300 ease-in-out hover:bg-blue-600 bottom-2 w-25 align-center justify-center" >
                                <center><span>Ignore</span></center>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </transition>
            <!---->
        </div>
    </div>
</div>
</template>
<script>
    import axios from 'axios';
    import VbSwitch from 'vue-bulma-switch'
    export default {
        components: {
            VbSwitch
        },
        data(){
            return{
            value: false,
            Templates:undefined,
            Offers:undefined,
            isFetched:false,
            OffersisFetched:false,
            showModalC:false,
            showModalS:false,
            htmlCode:null,
            OfferJson:null,
            Json:null,
            show: false,
            indexJsonadd:null,
            search:'',
            searchoffer:'',
            temppartJson:null,
            checked:false,
            selecteddesign:[],
            selectoption:null,
            idgen:0,
            }
        },
        methods:{
            change (id,name,color,pic,dated,datef) {
                if(this.value==true){
                    this.value=false;
                    console.log("HorV: "+id);
                    if(id =='V')
                    {
                        this.temppartJson= JSON.stringify({"cells":[1],"columns":[{"contents":[{"type":"image","values":{"containerPadding":"10px","_meta":{"htmlID":"u_content_image_1","htmlClassNames":"u_content_image"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true,"src":{"url":`${pic}`,"width":820,"height":387},"textAlign":"center","altText":"Image","action":{"name":"web","values":{"href":"","target":"_blank"}},"hideDesktop":false,"hideMobile":false}},{"type":"heading","values":{"containerPadding":"10px","_meta":{"htmlID":"u_content_heading_1","htmlClassNames":"u_content_heading"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true,"headingType":"h1","fontFamily":{"label":"Arial","value":"arial,helvetica,sans-serif"},"fontSize":"22px","color":`${color}`,"textAlign":"left","lineHeight":"140%","linkStyle":{"inherit":true,"linkColor":"#0000ee","linkHoverColor":"#0000ee","linkUnderline":true,"linkHoverUnderline":true},"hideDesktop":false,"hideMobile":false,"text":`${name}`}},{"type":"text","values":{"containerPadding":"10px","_meta":{"htmlID":"u_content_text_1","htmlClassNames":"u_content_text"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true,"color":"#95a5a6","textAlign":"left","lineHeight":"140%","linkStyle":{"inherit":true,"linkColor":"#0000ee","linkHoverColor":"#0000ee","linkUnderline":true,"linkHoverUnderline":true},"hideDesktop":false,"hideMobile":false,"text":"<p style=\"font-size: 14px; line-height: 140%;\">Date de publication: "+`${dated}`+"</p>\n<p style=\"font-size: 14px; line-height: 140%;\">Postuler avant: "+`${datef}`+"</p>"}},{"type":"button","values":{"containerPadding":"10px","_meta":{"htmlID":"u_content_button_1","htmlClassNames":"u_content_button"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true,"href":{"name":"web","attrs":{"href":"{{href}}","target":"{{target}}"},"values":{"href":"http://itskills.ma/jobs/stage-pfe-developpeur-web-php-laravel/","target":"_blank"}},"buttonColors":{"color":"#FFFFFF","backgroundColor":`${color}`,"hoverColor":"#FFFFFF","hoverBackgroundColor":"#3AAEE0"},"size":{"autoWidth":true,"width":"100%"},"textAlign":"center","lineHeight":"120%","padding":"10px 70px","border":{},"borderRadius":"4px","hideDesktop":false,"hideMobile":false,"text":"<span style=\"font-size: 14px; line-height: 16.8px;\">Join</span>","calculatedWidth":206,"calculatedHeight":37}}],"values":{"backgroundColor":"","padding":"0px","border":{},"_meta":{"htmlID":"u_column_1","htmlClassNames":"u_column"}}}],"values":{"displayCondition":null,"columns":false,"backgroundColor":"","columnsBackgroundColor":"","backgroundImage":{"url":"","fullWidth":true,"repeat":false,"center":true,"cover":false},"padding":"0px","hideDesktop":false,"hideMobile":false,"noStackMobile":false,"_meta":{"htmlID":"u_row_1","htmlClassNames":"u_row"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true}})+',';
                        this.selecteddesign.push({
                            id: this.idgen++,
                            name:name,
                            Json: this.temppartJson
                        })
                        console.log(this.selecteddesign)
                    }
                    else if(id=='H')
                    {
                        this.temppartJson= JSON.stringify({"cells":[1,1],"columns":[{"contents":[{"type":"image","values":{"containerPadding":"10px","src":{"url":`${pic}`,"width":500,"height":100},"textAlign":"center","altText":"Image","action":{"name":"web","values":{"href":"","target":"_blank"}},"_meta":{"htmlID":"u_content_image_1","htmlClassNames":"u_content_image"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true}}],"values":{"backgroundColor":"","padding":"0px","border":{},"_meta":{"htmlID":"u_column_1","htmlClassNames":"u_column"}}},{"contents":[{"type":"heading","values":{"containerPadding":"10px","headingType":"h1","fontFamily":{"label":"Arial","value":"arial,helvetica,sans-serif"},"fontSize":"22px","color":`${color}`,"textAlign":"left","lineHeight":"140%","linkStyle":{"inherit":true,"linkColor":"#0000ee","linkHoverColor":"#0000ee","linkUnderline":true,"linkHoverUnderline":true},"_meta":{"htmlID":"u_content_heading_1","htmlClassNames":"u_content_heading"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true,"text":`${name}`}},{"type":"text","values":{"containerPadding":"10px","color":"#000000","textAlign":"left","lineHeight":"140%","linkStyle":{"inherit":true,"linkColor":"#0000ee","linkHoverColor":"#0000ee","linkUnderline":true,"linkHoverUnderline":true},"_meta":{"htmlID":"u_content_text_1","htmlClassNames":"u_content_text"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true,"text":"<p style=\"font-size: 14px; line-height: 140%;\">"+`${dated}-${datef}`+""}},{"type":"button","values":{"containerPadding":"10px","href":{"name":"web","values":{"href":"","target":"_blank"}},"buttonColors":{"color":"#FFFFFF","backgroundColor":"#3AAEE0","hoverColor":"#FFFFFF","hoverBackgroundColor":"#3AAEE0"},"size":{"autoWidth":true,"width":"100%"},"textAlign":"center","lineHeight":"120%","padding":"10px 20px","border":{},"borderRadius":"4px","_meta":{"htmlID":"u_content_button_1","htmlClassNames":"u_content_button"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true,"text":"<span style=\"font-size: 14px; line-height: 16.8px;\">Button Text</span>"}}],"values":{"backgroundColor":"","padding":"0px","border":{},"_meta":{"htmlID":"u_column_2","htmlClassNames":"u_column"}}}],"values":{"displayCondition":null,"columns":false,"backgroundColor":"","columnsBackgroundColor":"","backgroundImage":{"url":"","fullWidth":true,"repeat":false,"center":true,"cover":false},"padding":"0px","hideDesktop":false,"_meta":{"htmlID":"u_row_1","htmlClassNames":"u_row"},"selectable":true,"draggable":true,"duplicatable":true,"deletable":true}})+',';
                        this.selecteddesign.push({
                            id: this.idgen++,
                            name:name,
                            Json: this.temppartJson
                        })
                        console.log(this.selecteddesign)
                    }
                }else{
                    let index = this.selecteddesign.findIndex(function(o){
                        return o.name === name; 
                    })
                    if (index !== -1) this.selecteddesign.splice(index, 1);
                    console.log(this.selecteddesign)
                    localStorage.setItem('temppartJson','')
                }
                
            },
            confirmselection()
            {
                localStorage.setItem('temppartJson',this.selecteddesign.map(function(elem){return elem.Json;}).join(""));
                this.Json=`{ "body": { "rows":`+localStorage.Json.substring(localStorage.Json.indexOf(`"rows":`)+7,Object.keys(localStorage.Json).length).replace(' ','');
                this.indexJsonadd=this.Json.indexOf(`"rows":`)+8;
                localStorage.setItem('Json',localStorage.Json= this.addStr(this.Json,this.indexJsonadd, localStorage.temppartJson));
                this.gotoRoute()
            },
            addStr(str, index, stringToAdd){
                return str.substring(0, index) + stringToAdd + str.substring(index, str.length);
            },
            showthisModal(compId,JsonT){
                this.htmlCode=compId.replace(/↵/g, "");
                this.Json=JsonT;
                localStorage.Json=this.Json;
                this.showModalC=true;
            },
            gotoRoute(){
                localStorage.type = "ITSkills";
                window.location.replace("https://okynewslettersdemo.000webhostapp.com/Templateeditor");
            },
            showsavelocalstorage(JsonT){
                this.Json=JsonT;
                localStorage.Json=this.Json;
                this.showModalS=true;
            },
            selectedTemplate(){
                this.showModalS=true;
                this.showModalC=false;
            },
            createNew(){
                localStorage.type=`ITSkills`;
                window.location.replace("https://okynewslettersdemo.000webhostapp.com/newtemplate");
            }
        },
        async mounted() {
           await axios.get('/getITSkillsTemplates')
                .then((response) =>{
                    this.Templates=response.data
                    this.isFetched=true
                } )
                .catch(error => {console.log(error.message)})
                console.log(this.Offers)
                axios.get('/getOffers')
                .then((response) =>{
                    this.Offers=response.data
                    this.OffersisFetched=true
                } )
                .catch(error => {console.log(error.message)})
                console.log(this.Offers)
            localStorage.clear();
        },
        computed: {
        filteredTemplates() {
          return this.Templates.filter(Template => {
            return Template.Name.toLowerCase().includes(this.search.toLowerCase())
          })
        },
        filteredOffers() {
          return this.Offers.filter(Offer => {
            return Offer.name.toLowerCase().includes(this.searchoffer.toLowerCase())
          })
        }
      }

    }



</script>

<style>
input{
    outline:none !important;
    border:none !important;
}
.irbu{
    border-radius: 20px !important;
}
.irbu1{
    border-radius: 20px !important;
    margin:0rem 25rem;

}
input:focus{
    outline:none !important;
    border:none !important;
}
.button {
 appearance: none;
 outline: none;
 border: none;
 background: none;
 cursor: pointer;

 display: inline-block;
 padding: 15px 25px;
 background-image: linear-gradient(to right, #CC2E5D, #FF5858);
 border-radius: 8px;

 color: #FFF;
 font-size: 18px;
 font-weight: 700;

 box-shadow: 3px 3px rgba(0, 0, 0, 0.4);
 transition: 0.4s ease-out;
}

.modal-overlay {
 position: absolute;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 z-index: 98;
 padding:0;
 margin:0;
height:112vh!important;
 background-color: rgba(0, 0, 0, 0.2);

}

.modal {
 position: fixed;
 top: 50%;
 left: 50%;
 transform: translate(-50%, -50%);
 z-index: 99;

 width: 100%;
 max-width: 400px;
 background-color: #FFF;
 border-radius: 16px;

 padding: 25px;
}
 h1 {
  color: #222;
  font-size: 32px;
  font-weight: 900;
  margin-bottom: 15px;
 }

 p {
  color: #666;
  font-size: 18px;
  font-weight: 400;
  margin-bottom: 15px;
 }


.fade-enter-active,
.fade-leave-active {
 transition: opacity .5s;
}

.fade-enter,
.fade-leave-to {
 opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
 transition: transform .5s;
}

.slide-enter,
.slide-leave-to {
 transform: translateY(-50%) translateX(100vw);
}
.select-dropdown,
.select-dropdown * {
	margin: 0;
	padding: 0;
	position: relative;
	box-sizing: border-box;
}
.select-dropdown {
	position: relative;
	background-color: #E6E6E6;
	border-radius: 4px;
}
.select-dropdown select {
	font-size: 1rem;
	font-weight: normal;
	max-width: 100%;
	padding: 8px 24px 8px 10px;
	border: none;
	background-color: transparent;
		-webkit-appearance: none;
		-moz-appearance: none;
	appearance: none;
}
.select-dropdown select:active, .select-dropdown select:focus {
	outline: none;
	box-shadow: none;
}
.select-dropdown:after {
	content: "";
	position: absolute;
	top: 50%;
	right: 8px;
	width: 0;
	height: 0;
	margin-top: -2px;
	border-top: 5px solid #aaa;
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
}

</style>
