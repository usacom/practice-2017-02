<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
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

                <div class="col-md-8">
                    <div v-if="TEXT!==''">
                        <h3>Текст:</h3>
                        <p>{{TEXT['TEXT']['CONTENT']}}</p>
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

                data2: '',
            }
        },
        methods: {
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
                        })
                        .catch((error) => {
                            this.data2 = error.response;
                        });

            },


        }
    }
</script>
