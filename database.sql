CREATE USER 'thien'@'localhost' IDENTIFIED BY 'weby';
GRANT ALL PRIVILEGES ON webx.* TO 'thien'@'localhost';

create table users (
    id serial primary key,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    date_of_birth date not null,
    sex varchar(50) not null,
    username varchar(50) not null unique,
    password varchar(255) not null,
    email varchar(100) not null unique,
    phone_number varchar(20) not null unique,
    created_at timestamp default current_timestamp
);
create table orders (
    id serial primary key,
    user_id integer references users(id) on delete cascade,
    order_date timestamp default current_timestamp,
    status varchar(50) not null,
    total_amount decimal(10, 2) not null
);

create table order_items (
    id serial primary key,
    order_id integer references oreders(id) on delete cascade,
    product_id integer references products(id) on delete cascade,
    quantity integer not null,
    price decimal(10, 2) not null
);
create table products (
    id serial primary key,
    name varchar(100) not null,
    description text,
    price decimal(10, 2) not null,
    stock integer not null,
    image_url varchar(255),
    created_at timestamp default current_timestamp
);


create table categories (
    id serial primary key,
    name varchar(100) not null unique,
    description text,
    created_at timestamp default current_timestamp
);
create table product_categories (
    id serial primary key,
    product_id integer references products(id) on delete cascade,
    category_id integer references categories(id) on delete cascade,
    created_at timestamp default current_timestamp
);
create table reviews (
    id serial primary key,
    product_id integer references products(id) on delete cascade,
    user_id integer references users(id) on delete cascade,
    rating integer not null check (rating >= 1 and rating <= 5),
    comment text,
    created_at timestamp default current_timestamp
);
create table addresses (
    id serial primary key,
    user_id integer references users(id) on delete cascade,
    street varchar(255) not null,
    city varchar(100) not null,
    state varchar(100) not null,
    postal_code varchar(20) not null,
    country varchar(100) not null,
    created_at timestamp default current_timestamp
);
create table payments (
    id serial primary key,
    order_id integer references oreders(id) on delete cascade,
    payment_date timestamp default current_timestamp,
    amount decimal(10, 2) not null,
    payment_method varchar(50) not null,
    status varchar(50) not null
);
create table carts (
    id serial primary key,
    user_id integer references users(id) on delete cascade
);

create table cart_items (
    id serial primary key,
    cart_id integer references carts(id) on delete cascade,
    product_id integer references products(id) on delete cascade,
    quantity integer not null,
    created_at timestamp default current_timestamp
);

create table notifications (
    id serial primary key,
    user_id integer references users(id) on delete cascade,
    message text not null,
    is_read boolean default false,
    created_at timestamp default current_timestamp
);
