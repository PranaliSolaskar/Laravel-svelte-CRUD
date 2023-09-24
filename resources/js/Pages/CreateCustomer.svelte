<script>
  import Layout from '@/Shared/Layout.svelte';
  import { router, useForm ,inertia ,} from '@inertiajs/svelte';

  let form = useForm({
    name: null,
    email: null,
    phoneno: null,
    image: null,
  });

  export let errors = {};

  async function submit() {
    let formData = {
      name: form.name,
      email: form.email,
      phoneno: form.phoneno,
      image: form.image,
    };

    try {
      console.log("lll");
      const response = await router.post('/customers', formData);
      console.log(response);
      if (response.ok) {
        router.visit('/customers'); // Navigate to the desired page
      } else {
        // Handle other status codes
      }
    } catch (error) {
      // Handle error
    }
  }
</script>

<!-- ... rest of your form ... -->

  
<layout>
<body>
  <div class="container mt-5 custom-container">
    <h2>Bootstrap Form Example</h2>
    <form on:submit|preventDefault={submit}>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input bind:value={form.name} type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
       {#if errors && errors['name']}
          <div class="alert alert-danger">
              <ul>
                  {#each errors['name'] as message}
                      <li>{message}</li>
                  {/each}
              </ul>
          </div>
        {/if}
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input bind:value={form.email} type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        {#if errors && errors['name']}
          <div class="alert alert-danger">
              <ul>
                  {#each errors['name'] as message}
                      <li>{message}</li>
                  {/each}
              </ul>
          </div>
        {/if}
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Phonr Number</label>
        <input class="form-control" bind:value={form.phoneno} id="phoneno" name="phoneno"  placeholder="Enter your Phone Number">
      </div><br>
       <div>
        <label for="image">Image:</label>
        <input type="file" id="image" bind:value={form.image} accept="image/*" >
        </div><br>
      <a use:inertia class="btn btn-secondary float-start" href="/customers" >Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</layout>

<style>
    .custom-container {
      background-color: lightblue;
      padding: 20px;
      border-radius: 10px;
    }
  </style>