#!/usr/bin/env python

import sys


def main():
    print("<table><tbody>")

    print("<tr><th>LEVEL</th><th>EXP NEEDED</th></tr>")

    memo = {}
    memo[1] = 100.0
    print(f"<tr><td>1</td><td>{int(memo[1])}</td></tr>")

    for lvl in range(2, 111):
        memo[lvl] = memo[lvl-1] * 1.1
        if memo[lvl] > 2000000:
            memo[lvl] = 2000000
        print(f"<tr><td>{lvl}</td><td>{int(memo[lvl])}</td></tr>")

    print("</tbody></table>")

    return 0


if __name__ == '__main__':
    sys.exit(main())
