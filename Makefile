up:
	docker compose --env-file ./srcs/.env -f ./srcs/docker-compose.yml up -d --build
down:
	docker compose -f ./srcs/docker-compose.yml down --remove-orphans
	docker image prune -f

re:
	$(MAKE) down
	$(MAKE) up

clean:
	docker compose -f ./srcs/docker-compose.yml down --remove-orphans --rmi all --volumes
	docker volume prune


fclean:
	$(MAKE) clean
