<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tech test</div>

                    <div class="card-body">
                       <form @submit.prevent="submitForm">
                        <div>
                            <span>Validation specifics:</span>
                            <ul>
                                <li>Name: required, max 20 chars.</li>
                                <li>Lastname: required, max 25 chars</li>
                                <li>Email: required, valid email address(rfc,dns checks) </li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <input type="name" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Name" v-model="form.name">
                        </div>
                        <div class="mb-3">
                            <input type="lastname" class="form-control" id="inputLastname" aria-describedby="lastnamelHelp" v-model="form.lastname" placeholder="Lastname">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" v-model="form.email" placeholder="Email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div v-if="this.errors.length > 0" class="mb-4 alert alert-danger" role="alert">
                            <span class="messages" v-for="error in errors" :key="error.id">{{ error }}</span>
                        </div>
                        <div v-if="this.success != '' " class="mb-4 alert alert-success" role="alert">
                            <span class="messages">{{ success }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    lastname: '',
                    email: '',
                },
                errors: [],
                success: ''
            }
        },
        methods: {
            async submitForm() {
                this.errors = [];
                let response = await axios.post('api/users/add', this.form);
                if (response.data != 'success') {
                    for(let prop in response.data) {
                     this.errors.push(JSON.stringify(response.data[prop]).slice(2, -2));
                    }
                } else {
                    this.success = 'Dati salvati con successo';
                } 
                }
        },
    }
</script>

<style scoped>
    .messages {
        display: block;
        font-weight: bold;
        padding: 2px;
    }
</style>
