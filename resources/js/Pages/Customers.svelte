<script>
    import Layout from '@/Shared/Layout.svelte';
    export let customers;
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
            {#each customers.data as customer}
            <tr>
            <th scope="row">{customer.id}</th>
            <td>{customer.name}</td>
            <td>{customer.email}</td>
            <td>{customer.phoneno}</td>
            <td>
                <button class="btn btn-info">View</button>
                <button class="btn btn-primary">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </td>
            </tr>
            {/each}
        </tbody>
    </table>
    <Pagination links={customers.links}/>
</Layout>
