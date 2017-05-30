<template>
    <div id="edit-profile-form">
        <form :action="path" method="POST">
            <!-- Name -->
            <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                <label for="name" class="control-label">Name*</label>
                <input type="text" id="name" class="form-control" name="name" v-model="form.name" required="required">
                <span class="help-block" v-show="form.errors.has('name')">
                                            {{ form.errors.get('name') }}
                                        </span>
            </div>

            <!-- Email -->
            <div class="form-group">

                <label for="email" class="control-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" readonly>
            </div>

            <!-- New Password -->
            <div class="form-group" :class="{'has-error': form.errors.has('password')}">

                <label for="password" class="control-label">New Password</label>

                <input type="password" id="password" class="form-control" name="password" v-model="form.password"
                       placeholder="•••••••">

                <span class="help-block" v-show="form.errors.has('password')">
                {{ form.errors.get('password') }}
                </span>
            </div>
            <br>
            <!-- Submit Button -->
            <button @click.prevent="submit"
                    type="submit"
                    class="btn btn-primary pull-right"
                    :disabled="form.busy"
            >Save
            </button>
        </form>
    </div>
</template>
<script>
    export default{
        props:['user'],
        data() {
            return {
                form: new Form({
                    name: '',
                    email: '',
                    password: '',
                }),
                path: '/profile'
            }
        },
        beforeMount(){
          console.log(this.user);
            this.form.name = this.user.name
            this.form.email = this.user.email
        },
        methods: {
            submit() {
                cosole.log('caca');
            },
        }
    }
</script>
