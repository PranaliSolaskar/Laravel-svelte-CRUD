<script>
export let cust;
console.log(cust);
import {inertia,router} from '@inertiajs/svelte';
function submit(){
    console.log(cust);
    const updatedData = {
      name:cust[0].name, 
      email:cust[0].email ,
      phoneno:cust[0].phoneno,
  }
    router.post(`/Customers/${cust[0].id}`, updatedData);
  }
</script>

<layout>
<body>
  <div class="container mt-5 custom-container">
    <h2>Bootstrap Form Example</h2>
    <form on:submit|preventDefault={submit}>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input bind:value={cust[0].name} type="text" class="form-control" id="name" name="name">
 
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input bind:value={cust[0].email} type="email" class="form-control" id="email" name="email" >
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Phone Number</label>
        <input class="form-control" bind:value={cust[0].phoneno} id="phoneno" name="phoneno">
      </div>
      <a use:inertia class="btn btn-secondary float-start" href="/customers" >Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</layout>

<style>
    .custom-container {
      background-color: lightyellow;
      padding: 20px;
      border-radius: 10px;
    }
  </style>