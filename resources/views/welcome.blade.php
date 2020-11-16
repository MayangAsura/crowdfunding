<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
​
        <title>Ajax Request With Axios + Vue</title>
​
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="app">
            <input type="text" v-model="name_input">
            
            <button v-show="add" @click="tambah"> Add </button>
            <button v-show="!add" @click="update"> Update</button>

            <ul>
                <li v-for="(user, index) in users">
                    @{{ user.nama}} <button @click="edit(index, user)">Edit </button> || <button type="button" @click="hapus(index, user)">Delete</button>
                </li>
            </ul>
        </div>
​
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="{{ asset('vendor/vue.js')}} "></script>

        <script type="text/javascript">
                    
            var app = new Vue({
                el: '#app',
                data: {
                    name_input: '',
                    add: true,
                    tmp_id: null,
                    user_id: null,
                    users: []
                        // {name: 'Ani'},
                        // {name: 'Budi'},
                        // {name: 'Tono'},
                    
                },
                methods: {
                    tambah: function(){
                        // this.users.push({name: this.name_input})
                        let namaIn = this.name_input;
                        axios.post('/api', { nama: namaIn }).then( response => {
                            this.users.push({nama: namaIn})
                        });
                        this.name_input = ''
                    },
                    edit: function(index, user){
                        this.name_input = this.users[index].nama
                        this.add = false
                        this.tmp_id = index
                        this.user_id = user.id
                    },
                    hapus: function(index, user){
                        var r = confirm('Anda Yakin?')
                        if(r){
                            axios.post('/api/delete/' + user.id).then(response => {
                                this.users.splice(index, 1)
                            })
                        }
                    },
                    update: function(){
                        console.log(this.user_id)
                        let namaIn = this.name_input;
                        let id = this.tmp_id
                        axios.post('/api/edit/'+ this.user_id, { nama: namaIn }).then( response => {
                            this.users[id].nama = namaIn
                        });
                        this.tmp_id = null
                        this.name_input = ''
                    }
                },
                mounted() {
                    axios.get('/api').then(response => {this.users = response.data.data} );
                }
            })
        </script>

    </body>
</html>