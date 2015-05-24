# Symfony2 rest API example

This project is meant to be an application of the tutorial created here:
[http://allan-simon.github.io/blog/posts/create-a-rest-api-with-symfony2/](http://allan-simon.github.io/blog/posts/create-a-rest-api-with-symfony2/)

the reader is adviced to read through the history of commits as well
as the code itself as it is heavily commented in order to serve as a
base of example for people wanting to create a REST Api with symfony2

The application code is located in `MyApplication/` folder

`provisioning` contains the ansible playbook and roles to provision a machine to run the project

## Concerning the database

to make sure the database is up to date, run the command

```
php app/console doctrine:migrations:migrate
```

in the folder `/vagrant/MyApplication/` of the vagrant machine

also make sure your `app/config/parameters.yml` has the driver set to `pdo_pgsql`
and the username password to `vagrant`
