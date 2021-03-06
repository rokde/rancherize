# ResourceLimit

Set resource limits for your service
These options can be used in the project namespace to set them for the main service or in the configuration of any service
providing its own configuration

Notable services supporting this:
- php-commands

## Options
- resource-limit.cpu
  - full: no limit
  - high: cap at 150% cpu - that is 1.5 CPUs
  - interactive: cap at 100% cpu
  - low: cap at 50% cpu
  - minimal: cap at 25% cpu
  - cron: cap at 25% cpu - subject to change
  - shared: no caps, share cpu, as many cpu cycles as containers without explicit share value when cpu is under pressure
  - shared-unimportant: no caps, half the cpu cycles of shared when cpu is under pressure
  - shared-important: no caps, double the cpu cycles of shared when cpu is under pressure
  - shared-very-important: no caps, four times the cpu cycles of shared when cpu is under pressure
- resource-limit.mem
  - full: no limit
  - high: cap at 1.5GiB cap, 1GiB reservation
  - low: cap at 512MiB cap, 256MiB reservation
  - minimal: cap at 128MiB cap, 64MiB reservation
- resource-limit.memory memory in bytes available to the container
  - Suffix `g` or `G` will convert the number to gibibytes
  - Suffix `m` or `M` will convert the number to mibibytes
  - Suffix `k` or `K` will convert the number to kibibytes
  
Note that hitting the cpu limit will only throttle your applications speed. Hitting the memory limit will prevent your
application from allocating memory which will most likely crashing it.

## Examples
Set high cpu usage and 4 GB ram cap
```json
"resource-limit":{
	"cpu":"high",
	"memory":4g
}
```