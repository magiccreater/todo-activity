<template>
    <div class="columns">
        <div class="column is-10 is-offset-1">
            <div class="box">
                <div>
                    <p>
                        <label>Tasks</label>
                        <a class="button is-info is-pulled-right" @click="initAddTask()">
                            <span class="icon is-small">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span>Add New Task</span>
                        </a>
                    </p>
                </div>
                <table class="table is-hoverable is-fullwidth is-striped" v-if="tasks.length">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(task, index) in tasks">
                            <td>{{ index + 1 }}</td>
                            <td>{{ task.title }}</td>
                            <td>{{ task.description }}</td>
                            <td>{{ task.status }}</td>
                            <td>
                                <button @click="initUpdate(index)" class="button is-small is-info is-outlined">Edit</button>
                                <button @click="initDeleteTask(index)" class="button is-small is-danger is-outlined">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="addTaskModal" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Add New Task</p>
                    <button class="delete" aria-label="close" @click="closeModal()"></button>
                </header>
                <section class="modal-card-body">
                    <div class="message is-danger" v-if="errors.length > 0">
                        <div class="message-body">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Title</label>
                        <input type="text" name="title" id="title" class="input is-medium" v-model="task.title" required>
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <textarea class="textarea" name="description" id="description" placeholder="Task Description" v-model="task.description"></textarea>
                    </div>
                    <div class="field">
                        <label class="label">Status</label>
                        <select name="status" id="status" v-model="task.status" required>
                            <option value="pending">Pending</option>
                            <option value="finished">Finished</option>
                        </select>
                    </div>

                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" @click="createTask">Submit</button>
                    <button class="button" @click="closeModal()">Cancel</button>
                </footer>
            </div>
        </div> <!-- /addTaskModal -->

        <div id="updateTaskModal" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Task</p>
                    <button class="delete" aria-label="close" @click="closeModal()"></button>
                </header>
                <section class="modal-card-body">
                    <div class="message is-danger" v-if="errors.length > 0">
                        <div class="message-body">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Title</label>
                        <input type="text" name="title" id="title" class="input is-medium" v-model="update_task.title" required>
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <textarea class="textarea" name="description" id="description" placeholder="Task Description" v-model="update_task.description"></textarea>
                    </div>
                    <div class="field">
                        <label class="label">Status</label>
                        <select name="status" id="status" v-model="update_task.status" required>
                            <option value="pending">Pending</option>
                            <option value="finished">Finished</option>
                        </select>
                    </div>
                    
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" @click="updateTask()">Submit</button>
                    <button class="button" @click="closeModal()">Cancel</button>
                </footer>
            </div>
        </div> <!-- /updateTaskModal -->

        <div id="deleteTaskModal" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Do you ready want to delete this task?</p>
                    <button class="delete" aria-label="close" @click="closeModal()"></button>
                </header>
                <section class="modal-card-body">
                    <div class="message is-danger" v-if="errors.length > 0">
                        <div class="message-body">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">{{ delete_task.title }}</label>
                        <p>{{ delete_task.description }}</p>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-danger" @click="deleteTask()">Delete</button>
                    <button class="button" @click="closeModal()">Cancel</button>
                </footer>
            </div>
        </div> <!-- /DeleteTaskModal -->

    </div>
</template>

<script>
    export default {
        data() {
            return {
                delete_task: {},
                delete_task_index: null,
                errors: [],
                task: {
                    title: '',
                    description: '',
                    status: ''
                },
                tasks: [],
                update_task: {}
            }
        },

        mounted() {
            this.readTasks();
        },

        methods: {
            closeModal() {
                $(".modal").removeClass("is-active");
            },

            createTask() {
                axios.post('/task', {
                    title: this.task.title,
                    description: this.task.description,
                    status: this.task.status,
                }, {
                    headers: { Authorization: '123 456' }
                })
                .then(response => {
                    this.reset();
                    this.tasks.push(response.data.task);

                    this.closeModal();
                })
                .catch(error => {
                    this.errors = [];
                    if (error.response.data.errors.title) {
                        this.errors.push(error.response.data.errors.title[0]);
                    }

                    if (error.response.data.errors.description) {
                        this.errors.push(error.response.data.errors.description[0]);
                    }

                    if (error.response.data.errors.status) {
                        this.errors.push(error.response.data.errors.status[0]);
                    }
                });
            },

            deleteTask() {
                axios.delete('/task/' + this.tasks[this.delete_task_index].id)
                    .then(response => {
                        this.tasks.splice(this.delete_task_index, 1);
                        this.closeModal();
                    })
                    .catch(error => {

                    });
            },

            initAddTask() {
                $("#addTaskModal").addClass("is-active");
            },

            initDeleteTask(index) {
                $("#deleteTaskModal").addClass("is-active");
                this.delete_task = this.tasks[index];
                this.delete_task_index = index;
            },

            initUpdate(index) {
                this.errors = [];
                $("#updateTaskModal").addClass("is-active");
                this.update_task = this.tasks[index];
            },

            readTasks() {
                axios.get('/task')
                    .then(response => {
                        this.tasks = response.data.tasks;
                    });
            },

            reset() {
                this.task.title = '';
                this.task.description = '';
                this.task.status = '';
            },

            updateTask() {
                axios.patch('/task/' + this.update_task.id, {
                    title: this.update_task.title,
                    description: this.update_task.description,
                    status: this.update_task.status,
                })
                .then(response => {
                    this.closeModal();
                })
                .catch(error => {
                    this.errors = [];
                    if (error.response.data.errors.title) {
                        this.errors.push(error.response.data.errors.title[0]);
                    }

                    if (error.response.data.errors.description) {
                        this.errors.push(error.response.data.errors.description[0]);
                    }

                    if (error.response.data.errors.status) {
                        this.errors.push(error.response.data.errors.status[0]);
                    }
                });
            },
        }
    }
</script>

