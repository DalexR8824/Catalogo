<p align="center">
    <h1 style ='color: red; text-align: center'>Catalogo - Prueba</h1>
</p>

# Requerimientos de la prueba

Esta prueba consiste en realizar un catálogo de productos sencillo, exponiendo un API desde Laravel, donde la funcionalidad requerida será:

- Los productos disponibles deben contener: imagen, sku, nombre,    descripción, categoría, stock y precio.
- Los productos pueden ser agregados a un carrito, que llevará el total a pagar, total de referencias y total de productos.
- Las categorías deberán de tener 2 niveles: categoría principal y categoría hija. Solo en la hija se pueden asignar los productos.
- Las categorías deberán tener: nombre y estado (activo/inactivo).


# Las funcionalidades esperadas son:

●   Los productos se mostrarán en el catálogo siempre y cuando el stock sea mayor a 0, la categoría del producto esté activa (tanto la padre como la hija) y el precio sea mayor a 0.

●     Se pueden agregar, eliminar o modificar productos al carrito.

●     Al agregar un producto al carrito y este supere la cantidad disponible, automáticamente colocarle la cantidad disponible.

●     El stock debe de descontarse al confirmar la compra.

●     Al llegar un producto a 0 de stock, ya no aparecerá en el catálogo.

# Tecnologia Usada

- Laravel 7
- MYSQL

# Rutas del API

<table>
    <thead>
    <tr>
    <th>URI</th>
    <th>Name</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <td>GET|HEAD</td>
        <td>api/cart </td>
        <td>cart.index </td>
        </tr>
        <tr>
        <td>POST</td>
        <td>api/cart</td>
        <td>cart.store</td>
        </tr>
        <tr>
        <td>DELETE</td>
        <td>api/cart/{cart}</td>
        <td>cart.destroy</td>
        </tr>
        <tr>
        <td>PUT|PATCH</td>
        <td>api/cart/{cart}</td>
        <td>cart.update</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/cart/{cart}</td>
        <td>cart.show</td>
        </tr>
        <tr>
        <td>POST</td>
        <td>api/categories</td>
        <td>categories.store</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/categories</td>
        <td>categories.index</td>
        </tr>
        <tr>
        <td>DELETE</td>
        <td>api/categories/{category}</td>
        <td>categories.destroy</td>
        </tr>
        <tr>
        <td>PUT|PATCH</td>
        <td>api/categories/{category}</td>
        <td>categories.update</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/categories/{category}</td>
        <td>categories.show</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/clients</td>
        <td>clients.index</td>
        </tr>
        <tr>
        <td>POST</td>
        <td>api/clients</td>
        <td>clients.store</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/clients/{client}</td>
        <td>clients.show</td>
        </tr>
        <tr>
        <td>PUT|PATCH</td>
        <td>api/clients/{client}</td>
        <td>clients.update</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/products</td>
        <td>products.index</td>
        </tr>
        <tr>
        <td>POST</td>
        <td>api/products</td>
        <td>products.store</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/products/{product}</td>
        <td>products.sho</td>
        </tr>
        <tr>
        <td>DELETE</td>
        <td>api/products/{product}</td>
        <td>products.destroy</td>
        </tr>
        <tr>
        <td>PUT|PATCH</td>
        <td>api/products/{product}</td>
        <td>products.update</td>
        </tr>
        <tr>
        <td>POST</td>
        <td>api/subcategories</td>
        <td>subcategories.store</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/subcategories</td>
        <td>subcategories.index</td>
        </tr>
        <tr>
        <td>DELETE</td>
        <td>api/subcategories/{subcategory}</td>
        <td>subcategories.destroy</td>
        </tr>
        <tr>
        <td>PUT|PATCH</td>
        <td>api/subcategories/{subcategory}</td>
        <td>subcategories.update</td>
        </tr>
        <tr>
        <td>GET|HEAD</td>
        <td>api/subcategories/{subcategory}</td>
        <td>subcategories.show</td>
        </tr>
    </tbody>
</table>

