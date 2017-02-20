<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <lable for="SECTIONS">Выберете SECTION</lable>
                    <select multiple class="form-control" id="SECTIONS" v-model="IDsectionSelect">
                        <option v-for="item in SECTIONS" :value="item['ID_SECTION']" @click="getWords()">
                            {{item['SECTIONNAME']}}
                        </option>
                    </select>

                    <br>

                    <lable v-if="WORDS!=''" for="WORDS">Выберете WORD</lable>
                    <select v-if="WORDS!=''" multiple class="form-control" v-model="IDwordsSelect" id="WORDS">
                        <option v-for="item in WORDS" :value="item['ID_WORD']" @click="getTexts()">
                            {{item['WORDNAME']}}
                        </option>
                    </select>

                    <br>

                    <lable v-if="TEXTS!=''" for="TEXTS">Выберете TEXT</lable>
                    <select v-if="TEXTS!=''" multiple class="form-control" v-model="IDtextSelect" id="TEXTS">
                        <option v-for="(item, id) in TEXTS" :value="id" @click="getText()">{{item['TEXTNAME']}}</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <h3>Текст:</h3>
                    <div v-if="TEXT!==''" v-html="viewText">
                        TEXT['TEXT']['CONTENT']
                    </div>
                </div>
                <div class="col-md-3">
                    <div v-if="TEXT!==''">
                        <!--<pre>{{TEXT['TEXT']['CONTENT'].replace(/<\/?[^>]+>/g,'').replace("[-.?!)(,:]", '').split(' ')}}</pre>-->
                        <lable v-if="dataText!=''" for="data1">Названия лексем</lable>

                        <select v-if="dataText!=''" multiple  @click="reloadText()" class="form-control size-form-lecsem" id="data1" v-model="selected">
                            <option v-for="(item, id) in dataText"  :value="id">{{item.replace(/<\/?[^>]+>/g,'').replace(/[-.?!)(,:]/g, '')}}</option>
                        </select>
                        <!--<br>-->
                        <!--<pre>{{selected}}</pre>-->
                    </div>
                </div>
            </div>


            <div v-if="TEXT!==''">
                <!--<pre>{{TEXT}}</pre>-->
                <table class="table">
                    <caption>Паспорт</caption>
                    <tbody>

                    <tr>
                        <th>Собиратель</th>
                        <td>{{TEXT['COLLECTOR']['COLLECTORNAME']}}</td>
                    </tr>
                    <tr>
                        <th>Исполнитель</th>
                        <td>
                            {{TEXT['CONTRACTORS']['CONTRACTORNAME']}},

                            {{TEXT['AREA2']['AREANAME']}} /
                            {{TEXT['COUNTRY2']['COUNTRYNAME']}} /
                            {{TEXT['VILLAGE2']['VILLAGENAME']}}
                            , {{TEXT['CONTRACTORS']['RYEAR']}} г.р.
                        </td>
                    </tr>
                    <tr>
                        <th>Место записи</th>
                        <td><p>{{TEXT['AREA']['AREANAME']}} /
                            {{TEXT['COUNTRY']['COUNTRYNAME']}} /
                            {{TEXT['VILLAGE']['VILLAGENAME']}}</p></td>
                    </tr>
                    <tr>
                        <th>Место хранения</th>
                        <td><p>{{TEXT['LOCATIONS']['LOCATIONNAME']}}</p></td>
                    </tr>
                    <tr>
                        <th>Год фиксации</th>
                        <td>{{TEXT['TEXT']['RECYEAR']}}</td>
                    </tr>
                    <tr>
                        <th>Звуковой файл</th>
                        <td><a :href="TEXT['TEXT']['AUDIO']">{{TEXT['TEXT']['AUDIO']}}</a></td>
                    </tr>
                    <tr>
                        <th>Воспроизведение файла</th>
                        <td>
                            <audio controls>
                                <source :src="TEXT['TEXT']['AUDIO']" type="audio/mpeg">
                                Тег audio не поддерживается вашим браузером.
                            </audio>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <!--<pre>{{data2.data}}</pre>-->
        </div>
    </div>
</template>
<style lang="css">
    .size-form-lecsem{
        height: 30rem !important;
    }
    .red{
        color: red;
    }
</style>
<script type="text/babel">

    export default{
        props: ['data'],
        data(){
            return {
                SECTIONS: this.data,
                IDsectionSelect: '',

                WORDS: '',
                IDwordsSelect: '',

                TEXTS: '',
                IDtextSelect: '',

                TEXT: '',
                dataText: [],
                viewText: '',
                selected: [],

                data2: '',
            }
        },
        methods: {
            reloadText(){
                let data = _.clone(this.dataText);
                for(let i = 0; i< this.selected.length; i++){
                    let res = data[this.selected[i]].match(/<\/?[^>]+>/g);
                    console.log(res);
                    if(res==null){
                        data[this.selected[i]] ='<span class="red">'+data[this.selected[i]]+'</span>';
                        console.log(data[this.selected[i]]);
                    }else {

                        let arraySTR = data[this.selected[i]].split(/<\/?[^>]+>/g);
                        for(let j = 0; j< arraySTR.length; j++){
                            if(arraySTR[j]==''){
                                arraySTR[j] = res.shift();
                            }else {
                                arraySTR[j] = '<span class="red">'+arraySTR[j]+'</span>';
                            }
                        }
                        data[this.selected[i]] = arraySTR.join('');
                    }
                }
                // this.selected.forEach((item, i) => {
                //
                // });

                this.viewText = data.join(' ');
            },
            showText(id){
                console.log(id);
                let data = this.dataText;

                this.viewText = data.join(' ');
            },
            getWords(){
                this.WORDS = '';
                this.TEXTS = '';
                this.TEXT = '';
                axios.get('/api/getWords/' + this.IDsectionSelect)
                        .then((response) => {
                            console.log(response);

                            this.data2 = response;
                            this.WORDS = response.data;
                        })
                        .catch((error) => {
                            this.data2 = error.response;
                        });

            },
            getTexts(){
                this.TEXTS = '';
                this.TEXT = '';
                axios.get('/api/getTexts/' + this.IDwordsSelect)
                        .then((response) => {
                            console.log(response);
                            this.data2 = response;
                            this.TEXTS = response.data;
                        })
                        .catch((error) => {
                            this.data2 = error.response;
                        });

            },
            getText(){
                this.TEXT = '';
                axios.get('/api/getText/' + this.TEXTS[this.IDtextSelect]['ID_TEXT'])
                        .then((response) => {
                            console.log(response);
                            this.data2 = response;
                            this.TEXT = response.data;
                            this.dataText = this.TEXT['TEXT']['CONTENT'].split(' ');
                            this.viewText = this.dataText.join(' ');
                            // .replace(/<\/?[^>]+>/g,'').replace(/[-.?!)(,:]/g, '')
                        })
                        .catch((error) => {
                            this.data2 = error.response;
                        });

            },


        }
    }
</script>
