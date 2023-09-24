<script>
    import {inertia} from'@inertiajs/svelte' 
    import Layout from '@/Shared/Layout.svelte';
    export let customers;
    import Pagination from '@/Shared/Pagination.svelte';
</script>

<Layout>
    <a use:inertia class="btn btn-primary btn-sm" href="customers/create">Add Student</a>
    <a use:inertia class="btn btn-primary btn-sm" href="customers/onlytrash">Deleted Student</a>
    
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Phone no</th>
            </tr>
        </thead>
        <tbody> 
            {#each customers.data as customer}
            <tr>
            <th scope="row">{customer.id}</th>
            <td>{customer.name}</td>
            <td>{customer.email}</td>
            <td>{customer.phoneno}</td>
            <td>
                <button class="btn btn-info">View</button>
                <a use:inertia href="/customers/{customer.id}/edit" class="btn btn-primary">Edit</a>
                <a use:inertia href="/customers/{customer.id}/delete" class="btn btn-danger">Delete</a>
                <a use:inertia href="/customers/{customer.id}/trash" class="btn btn-danger">Trash</a>
            </td>
            </tr>
            {/each}
        </tbody>
    </table>
    <Pagination links={customers.links}/>
</Layout>
