{{ content() }}
{{ form("users/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("users", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit users</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="username">Username</label>
        </td>
        <td align="left">
            {{ text_field("username", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="password">Password</label>
        </td>
        <td align="left">
                {{ select_static("password", "using": []) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="name">Name</label>
        </td>
        <td align="left">
            {{ text_field("name", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="email">Email</label>
        </td>
        <td align="left">
            {{ text_field("email", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="created_at">Created</label>
        </td>
        <td align="left">
            {{ text_field("created_at", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="active">Active</label>
        </td>
        <td align="left">
                {{ select_static("active", "using": []) }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
