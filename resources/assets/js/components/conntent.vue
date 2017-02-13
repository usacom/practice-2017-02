<template>
    <div class="panel panel-default">
        <div class="panel-body">


            <lable for="SECTIONS">Выберете SECTION</lable>
            <select class="form-control" id="SECTIONS" v-model="IDsectionSelect">
                <option v-for="item in SECTIONS" :value="item['ID_SECTION']">{{item['SECTIONNAME']}}</option>
            </select>
            <button class="btn btn-default" type="button" v-if="IDsectionSelect!=''" @click="getWords()">Отправить
            </button>

            <br>

            <lable v-if="WORDS!=''" for="WORDS">Выберете WORD</lable>
            <select v-if="WORDS!=''" class="form-control" v-model="IDwordsSelect" id="WORDS">
                <option v-for="item in WORDS" :value="item['ID_WORD']">{{item['WORDNAME']}}</option>
            </select>
            <button class="btn btn-default" type="button" v-if="IDwordsSelect!=''" @click="getTexts()">Отправить
            </button>

            <br>

            <lable v-if="TEXTS!=''" for="TEXTS">Выберете TEXT</lable>
            <select v-if="TEXTS!=''" class="form-control" v-model="IDtextSelect" id="TEXTS">
                <option v-for="(item, id) in TEXTS" :value="id">{{item['TEXTNAME']}}</option>
            </select>
            <button class="btn btn-default" type="button" v-if="IDtextSelect!==''" @click="getText()">Отправить
            </button>

            <div v-if="TEXT!==''">

                <h3>Текст:</h3>
                <p>{{TEXT['TEXT']['CONTENT']}}</p>
                Audio
                <audio controls>
                    <source :src="TEXT['TEXT']['AUDIO']" type="audio/mpeg">
                    Тег audio не поддерживается вашим браузером.
                </audio>

                <h3>Имя: {{TEXT['TEXT']['TEXTNAME']}}</h3>

                <table class="table">
                    <caption>Паспорт</caption>
                    <tbody>
                    <tr>
                        <th>TEXTORDER</th>
                        <td>{{TEXT['TEXT']['TEXTORDER']}}</td>
                    </tr>
                    <tr>
                        <th>RECYEAR</th>
                        <td>{{TEXT['TEXT']['RECYEAR']}}</td>
                    </tr>
                    <tr>
                        <th>COLLECTOR</th>
                        <td>{{TEXT['COLLECTOR']['COLLECTORNAME']}}</td>
                    </tr>
                    <tr>
                        <th>CONTRACTORS</th>
                        <td>{{TEXT['CONTRACTORS']['CONTRACTORNAME']}}</td>
                    </tr>
                    <tr>
                        <th>LOCATIONS</th>
                        <td><p>{{TEXT['LOCATIONS']['LOCATIONNAME']}}</p></td>
                    </tr>
                    <tr>
                        <th>WORDS</th>
                        <td><p>{{TEXT['WORDS']['WORDNAME']}}</p></td>
                    </tr>
                    <tr>
                        <th>VILLAGE</th>
                        <td><p>{{TEXT['VILLAGE']['VILLAGENAME']}}</p></td>
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
