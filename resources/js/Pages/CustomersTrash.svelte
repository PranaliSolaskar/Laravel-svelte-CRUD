<script>
    import {inertia} from'@inertiajs/svelte' 
    import Layout from '@/Shared/Layout.svelte';
    export let customs;
    console.log(customs);
    import Pagination from '@/Shared/Pagination.svelte';
</script>

<Layout>
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
            {#each customs as customer}
            <tr>
            <th scope="row">{customer.id}</th>
            <td>{customer.name}</td>
            <td>{customer.email}</td>
            <td>{customer.phoneno}</td>
            <td>
                <button class="btn btn-info">View</button>                
                <a use:inertia href="/customers/{customer.id}/restore" class="btn btn-danger">Restore</a>                
            </td>
            </tr>
            {/each}
        </tbody>
    </table>
</Layout>
