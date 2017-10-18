<template>
  <div class="w3-container">
    <div class="w3-row">
      <div class="w3-col m-12">

        <div class="w3-panel w3-pale-blue">
          <h1>Task App</h1>
        </div>

        <div class="w3-container">
          <!-- Open Modal -->
          <button class="w3-button w3-block w3-teal" @click="openModal()">Add Task</button>
        </div>

        <div class="w3-container w3-margin w3-border">
          <p>Body</p>
        </div>

          <!-- Modal -->
          <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-animate-opacity w3-card-4">

              <header class="w3-container w3-teal">
                <span @click="closeModal()"
                class="w3-display-topright w3-xxlarge w3-padding close" >&times;</span>
                <h2>Add a New Task</h2>
              </header>

              <!-- Errors -->
              <div class="w3-text-red w3-small" v-if="errors.length > 0">
                <ul>
                  <li v-for="error in errors">
                    {{ error }}
                  </li>
                </ul>
              </div>

              <div class="w3-container w3-margin">
                <div class="w3-container">
                  <label for="name" class="w3-large">Name:</label>
                  <input type="text" name="name" id="name" placeholder="Task Name ..." class="w3-input" v-model="task.name">
                </div>

                <br>

                <div class="w3-container">
                  <label for="description" class="w3-large">Description:</label>
                  <br>
                  <textarea name="description" rows="8" cols="50" class="w3-border-bottom" style="width: 100%; border: none;" placeholder="Task Description ..." v-model="task.description"></textarea>
                </div>
              </div>

              <footer class="w3-container w3-teal">
                <button type="button" class="w3-button w3-white w3-margin w3-right" @click="createTask">Submit</button>
              </footer>
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
      task: {
        name: '',
        description: ''
      },
      errors: []
    }
  },
  methods: {
    openModal() {
      document.getElementById('id01').style.display='block';
    },
    closeModal() {
      document.getElementById('id01').style.display='none';
    },
    createTask() {
      axios.post('/task', {
        name: this.task.name,
        description: this.task.description
      })
      .then(response => {
        this.reset();
        document.getElementById('id01').style.display='none';
      })
      .catch(error => {
        this.errors = [];
        if (error.response.data.errors.name) {
          this.errors.push(error.response.data.errors.name[0]);
        }
        if (error.response.data.errors.description) {
          this.errors.push(error.response.data.errors.description[0]);
        }
      });
    },
    reset() {
      this.task.name = '';
      this.task.description = '';
    }
  }
}
</script>

<style>
</style>
