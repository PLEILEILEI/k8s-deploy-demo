FROM golang:latest
WORKDIR $GOPATH/src/hello
COPY . $GOPATH/src/hello
RUN go build .

EXPOSE 8000
ENTRYPOINT ["./hello"]
