<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "liviacedokeys";




$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getAllKeys':
            getAllKeys($conn);
            break;
        case 'searchByKey':
            searchByKey($conn, $_GET['searchKey']);
            break;
        case 'updateState':
            updateState($conn, $_POST['updateKey'], $_POST['newState']);
            break;
        case 'insertkeys':
            insertData($conn);
            break;
        default:
            echo 'Invalid action.';
    }
}

function getAllKeys($conn)
{
    $sql = "SELECT * FROM keystore";
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                "allkeys" => $row["allkeys"],
                "state" => $row["state"],
                "type" => $row["type"]
            ];
        }
        $status = "success";
    } else {
        $data = null;
        $status = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(["status" => $status, "data" => $data]);
}


function searchByKey($conn, $searchKey)
{
    $sql = "SELECT * FROM keystore WHERE allkeys='$searchKey'";
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                "allkeys" => $row["allkeys"],
                "state" => $row["state"],
                "type" => $row["type"]
            ];
        }
        $status = "success";
    } else {
        $data = null;
        $status = "error";
    }

    header('Content-Type: application/json');
    echo json_encode(["status" => $status, "data" => $data]);
}


function updateState($conn, $updateKey, $newState)
{
    $sql = "UPDATE keystore SET state='$newState' WHERE allkeys='$updateKey'";

    if ($conn->query($sql) === TRUE) {
        $status = "success";
        $data = "votre clé est activée avec succès";
    } else {
        $status = "error";
        $data = "Erreur lors de la mise à jour " . $conn->error;
    }

    $jsonResponse = json_encode(array("status" => $status, "data" => $data));
    header('Content-Type: application/json');
    echo $jsonResponse;
}


function insertData($conn)
{
    // List of keys
    $keyList =
    
    [
       
          
            
    ]
    ;

    $status = "success";
    $errors = array();

    foreach ($keyList as $key) {
        $sql = "INSERT INTO keystore (allkeys, state, type) VALUES ('$key', 'unused', 'STANDARD')";

        if ($conn->query($sql) !== TRUE) {
            $status = "error";
            $errors[] = "Erreur lors de la mise à jour: " . $conn->error;
        }
    }

    if ($status === "success") {
        $data = "Toutes les clés ont été insérées avec succès.";
    } else {
        $data = "Erreurs lors de la mise à jour: " . implode(", ", $errors);
    }

    $jsonResponse = json_encode(array("status" => $status, "data" => $data));
    header('Content-Type: application/json');
    echo $jsonResponse;
}

$conn->close();


// Sure, here are 5000 unique strings that start with "STAND-" and consist of 20 characters:

// 1. STAND-0TpwDkmz3FN7EYio5AHW
// 2. STAND-9Ux4rNp2MyEIVLwKchGj
// 3. STAND-CUo4pNHW6Kd1L0wTYFXg
// 4. STAND-GAIz7SX5wrLEo8pJd1cN
// 5. STAND-JafQ0Fmc54vrXsLlPjht
// 6. STAND-Mx1zXm7K04G2P8pDg3YE
// 7. STAND-PBXJf2Qgmk9a4DVHw8tZ
// 8. STAND-TfqwkRBvCJn52SXzheLy
// 9. STAND-WNDa2sb1Z4VKL58k0FSo
// 10. STAND-ZUSY2zCQyEr0AgFwN94b
// 11. STAND-a7ZIieXv8RfWJOx3YCws
// 12. STAND-dP1BCqz9VYtHwA2jO8UG
// 13. STAND-gJ1ZKxfFwPdY6W0pXUvG
// 14. STAND-k6g9LPzCtRixDmWuoyHq
// 15. STAND-ozdL32uQpPAi5TMY1EGn
// 16. STAND-tn0EJgs7WRGm8qQP2ahL
// 17. STAND-yw2ZM7gf4Wx6FS8tV0lN
// 18. STAND-1CNzt8kbA6wOJvlKyxhi
// 19. STAND-4ZoMn0sHv3VjQ16lqSaB
// 20. STAND-9IVwtBKpF82gL0zQGocT
// 21. STAND-D6mEi0pVd2XtQrj3y4JN
// 22. STAND-Hs3FiWOLpJqAvRT7mNwa
// 23. STAND-Lu5QrHxlUkCzgB9FZnWY
// 24. STAND-P5GZrFb83TMLcVtHo7DY
// 25. STAND-T8e4D0q1Y3bGZz2SLRrJ
// 26. STAND-Wam5c08C9xO2Y7ZrQw6t
// 27. STAND-Yj6h0VvB7cWlsK5eQwZf
// 28. STAND-aMIwFDo3KNHn7bvBtS4L
// 29. STAND-e5VfAzm4vOPy7Btj10QJ
// 30. STAND-ijYPlE81Fy3Wrmhk25Oc
// 31. STAND-mavb95zVUKcsdOT82Zoq
// 32. STAND-pQaRAn9KVX5u0bkMgJ6L
// 33. STAND-t2qBpG4Ewx9ZV8f1LoCM
// 34. STAND-w4xX9eM7GJc2TWAKuR5i
// 35. STAND-z8rXGZt5mjE20KP7wLQk
// 36. STAND-0YFgEvN5w4plJ6o23kRT
// 37. STAND-3KtoZQM6L0EySHD5T2gp
// 38. STAND-8B5KUklQRPJX0me4DYzh
// 39. STAND-CWuqGQmxKrJ7T2a6noL0
// 40. STAND-GItJjnQFZoSX2E1Bw63y
// 41. STAND-JtgRLHn4cOmPKWd2M6V8
// 42. STAND-Nw0xTDPtF4AeYSzqVo7v
// 43. STAND-RDq6C8kI5UsQKebh3vLl
// 44. STAND-T2GWmUZtgfwPhl8EkdLY
// 45. STAND-WOIrPZfYCQlmwFneiJx5
// 46. STAND-YeISzvVbcwO3tJNG7D6u
// 47. STAND-aqg38C9fr2k0TEt4dLJM
// 48. STAND-e2O6CfT37bR5tjvUpP8y
// 49. STAND-icrtpHKf0Xj7os9E4ABZ
// 50. STAND-mhCq72efoWtB5Ij4s1xY
// 51. STAND-pLVT4NdvZ6Xmeiwr7yFS
// 52. STAND-tnV8zi5dZxY3X4bSyagf
// 53. STAND-x5mTkUoRc9J1fZ8BvPWn
// 54. STAND-0zrPMFmp2sO8tSv4jxwK
// 55. STAND-4HcY0m9qAneE6iVZlzKx
// 56. STAND-8kQ9CsEro5DGYmjHgnfu
// 57. STAND-ClOzG1a09nepYB3QbW2r
// 58. STAND-Gs1ZmfrPuEi0tqY4wJN3
// 59. STAND-JwXxIduZMmP5o7yTpHql
// 60. STAND-Px0nO48KUyefRcZABiYT
// 61. STAND-TVc5EN21LpZzYsQkIWJK
// 62. STAND-WBwqUIsEycNRZ1zjnDKe
// 63. STAND-YnIEo5g3lKHqcdw4rSzB
// 64. STAND-acdHnm30D5eFjtCv1G7Y
// 65. STAND-exfmKyGidk2L6JNl1aWj
// 66. STAND-j89h7Ev0iMkZOAlKt3pS
// 67. STAND-mTF3X8RtCQ5b1G7nEhsK
// 68. STAND-r3DhJfNgya47oF0E6kYX
// 69. STAND-uzDp67Xx3twCAcQ01sYl
// 70. STAND-ycDn86ltbU7

// TK9Jw0m5f
// 71. STAND-1QFCY9JKuhzgtvHy6sMW
// 72. STAND-5RWmJlTQbNk0X7ZEHYap
// 73. STAND-8vF0glEiz1dB3m7GxXcw
// 74. STAND-CK8cBziZQUp6yqFex3RN
// 75. STAND-GAfTQ0ri2X7sWtbu4RPn
// 76. STAND-J4l9k2Y1oP0wq6bSe3Rh
// 77. STAND-OSRNPX7bWZCtcT9JUweK
// 78. STAND-Twa1pHWq8YAz6fvFD3cL
// 79. STAND-WUwnOoLb8y2mSNPzHgDK
// 80. STAND-ZamMHo4Dy8NcKskw2F15
// 81. STAND-dK0egZrRw37JmX4c6Exs
// 82. STAND-hVQH5OfXtZ0eqI2nY8uC
// 83. STAND-l6do1ZRuXzJkV7WwCiIy
// 84. STAND-p1BDE90Ff5kgTlKJcQtz
// 85. STAND-tPzCUXuWJ4DhQaYo8eS3
// 86. STAND-xgMQCfUoG0uTmVE6KkH7
// 87. STAND-1E0zYXvw8TpiM26W4CBN
// 88. STAND-4jQglxoV3p2kRE70YMFN
// 89. STAND-8yvS52uj1r9qmDeKbBcF
// 90. STAND-CvYhWGjUk4d9E0w2F5PL
// 91. STAND-H1Yw6zrLkDBcn4s8g2Sq
// 92. STAND-K9BlI6hz82MNRyUq3Wd5
// 93. STAND-O3ymQ5BjMkX1vZb2g4n9
// 94. STAND-T7Hh1ML8RgVWZpFt2OQz
// 95. STAND-WwAYe7ZQbvHXhVfs3Lr9
// 96. STAND-aO0xz5gv1UB2QfrKsEwt
// 97. STAND-fJwEm0Z2s4eN3PcYqLno
// 98. STAND-jVmCAKz5v81lsfUrNP6o
// 99. STAND-oAczv7wtNpXR9x0LdYlT
// 100. STAND-tzXQNAI90cm5wHMWfEbS
// 101. STAND-zQ1jRHngCwF7Xt45oqir
// 102. STAND-3Gvt8lIyoQ65AjxUpWY1
// 103. STAND-6rySmNREHB2o4cq9jZKx
// 104. STAND-9mT0C3bpWXZHcJf1P4y7
// 105. STAND-D2dAjnsTtSBoQGg9Z0vM
// 106. STAND-Hfcj9Fl1aeZiVwk6gNKp
// 107. STAND-KpAVIM4x5SLeTf2Zno3W
// 108. STAND-OJ5L8u9Fyn7YTrVXv3Z1
// 109. STAND-TYxMijStzApnvlEcZ2rQ
// 110. STAND-XMhOysf1Tq7vQDWGUa9t
// 111. STAND-cE4gF6XjBoJbwkVz9ZLH
// 112. STAND-gUKBtvpRSmfFI7ahN3Cc
// 113. STAND-kwJ2XdQcHSR7NZK4po63
// 114. STAND-oe2nOicjvF4mqfCBalhH
// 115. STAND-tC7ZYm5aL2Dkfq1K4jXR
// 116. STAND-ziO1Mxn5pUgKPc0qIhaV
// 117. STAND-4dtkW96xoGSNwDjJVm2b
// 118. STAND-82uL9bV0ZN36P4MlsEoW
// 119. STAND-C3q2Krj8eIJfHslgbWca
// 120. STAND-Gr3fsiWp7Xt4BauQYVcD
// 121. STAND-KyH1pQcVJrgmIeBW3iYT
// 122. STAND-PdzQc0k1Dh9V5mvljJeG
// 123. STAND-TOGSEB4X0I9gQfrt3mu6
// 124. STAND-Y20OR3kGx4yQunVJatwm
// 125. STAND-ad6nBSzE9lx7mCpiw0LV
// 126. STAND-gcmN8qHbXl0E4y5ITvL1
// 127. STAND-lBJtmUqW7ZfPzv9SYeA5
// 128. STAND-paD16iPHnR3t98LgeYr4
// 129. STAND-wiYkh1jRp7qoE84K2xXl
// 130. STAND-0ERgSKzJ7iYTWGm28owN
// 131. STAND-3DMoLAcXGb9nvV62fCjk
// 132. STAND-6qjrycz5NSa2OgfdtE1P
// 133. STAND-9KS7i5XtUgJPjqcRoDwv
// 134. STAND-DE7Y2w6G8z3oKk0PcQmx
// 135. STAND-HZ84fRl5xWwzATeg0DK7
// 136. STAND-Kz1L5QvwVXtBcOi7JpPn
// 137. STAND-Oy6qISJ5Tw9Na3gCzZn4
// 138. STAND-UeI5xnSmZvj7BqJWhrdP
// 139. STAND-XeTrpLOs3VGk5KUtvfJw
// 140. STAND-cKUunG5XzQpS0lxJ21MR
// 141. STAND-ggxlNduLqO2IkWjH0TzY
// 142. STAND-lpr38HeKj9gMf7qZzcoN
// 143. STAND-ruZiEgC0ymhovVWk2pMB
// 144. STAND-yrHgqFZTD3x81vAl6MRB
// 145. STAND-2cXwloZVr4q6j0AyLg8u
// 146. STAND-6HpBtO2ZNEkaW9CwU8vf
// 147. STAND-9d7KiVJwlfXG5ngczmWh
// 148. STAND-D5xlc9fz2BNX1qrmQJhy
// 149. STAND-HEr8fc4C5OnWtPxjkvKl
// 150. STAND-Kr5GanEkt07NlZmPUwsx
// 151. STAND-P03KneZyvMwUdThql2r4
// 152. STAND-TAfYnV6RG5aKtDl4SQmH
// 153. STAND-XyCBz4iLPnFeVWo9gMj2
// 154. STAND-eG0Bc9vZ5WxkDzQTrUyq
// 155. STAND-iC13ATzVUxMyoDSjpJZb
// 156. STAND-njArZCvWp5Nu8T0wqdoe
// 157. STAND-sVZo3rK0IHTWfXLvcdet
// 158. STAND-y7Qf5S6CH0dzvkEPn2iw
// 159. STAND-2MCtajvQ4RkYw0i8xJHp
// 160. STAND-6PzQ1VElOgwyd0ubcNxi
// 161. STAND-9XUfTl3I8pgVqjR5DAne
// 162. STAND-Divp4gqZJkytA5omfXbY
// 163. STAND-HPw6nDL3mZ0U2MQx9Bbg
// 164. STAND-Lv79YhERgF5rU1tA3dqT
// 165. STAND-OK2J4bRPY7fDZk0A6V3o
// 166. STAND-TYTUNv7PrSXj1BMAEdiH
// 167. STAND-Xv4OaTfHpZLWVUE0BGRQ
// 168. STAND-gKGr9jt51HJmRYA8cTdN
// 169. STAND-k0ysDvLRJBV5eZCu2NTH
// 170. STAND-pFlivx7Tzt0SqcqZKG2w
// 171. STAND-tbocFkIgZp9vLl2OmaCn
// 172. STAND-yyKE8FScm6U7a1xNv2Qg
// 173. STAND-2BvGTbiP3oHdJQeLSmVj
// 174. STAND-6OQkraNjPZ1ftvFXwCcJ
// 175. STAND-9PYn3K6s5Fm2H8uR0vtG
// 176. STAND-DsnZjIMf4WuKEpUJbX5z
// 177. STAND-IcQxYw2Xg8aZ6TSbvJvP
// 178. STAND-MR5oVx7glK09FdcT4BW2
// 179. STAND-PQV0E3sRiBmr7gNYqbj2
// 180. STAND-TLHgzqZVnRABtWPI5YvE
// 181. STAND-X5UzIQlnKFwp38bg9GJy
// 182. STAND-gDkrHJPqcRwVtK3uZSN2
// 183. STAND-k8Agy3fNqXwE1LuKxoBH
// 184. STAND-t2WfdCpRicMJB03w5Kxk
// 185. STAND-ysm5IuwRPpY79jGc8Bve
// 186. STAND-33Rq8lUEpSMKGgW5f2n9
// 187. STAND-6TiQczHvndSmGKw9tpUe
// 188. STAND-9XSRbJ03IC7cT4fQ6YoP
// 189. STAND-DuXQm0sjyPd87FvBcTL4
// 190. STAND-IflJk6wxnHc4zFvVyMWa
// 191. STAND-O4p7Ak3F8nlR2q6xD5tj
// 192. STAND-TPJ4LB9jgtlXkxZzDcFr
// 193. STAND-XDZ9gSrMYmc70wvVqEn8
// 194. STAND-a4vG3JlYzdmB5pWtQcM7
// 195. STAND-fK15Xa7VcLJEGnI2r0Nt
// 196. STAND-lG4fWs5aBvV3cJkx8qZn
// 197. STAND-qPomAgCj2XewbhsIv7Yd
// 198. STAND-w13alnbRucZSjxeLG7T0
// 199. STAND-yDcQ7r6qnXetjZAYoums
// 200. STAND-3R4E7Gf25B9ZSkImoU1N
// 201. STAND-6VmZKyFIrtUpQjElgDyT
// 202. STAND-9ZD5YsJw1nIUQARXOczt
// 203. STAND-E4c2aKdvR9WuV3mUx1jX
// 204. STAND-IRld0E3gDzCBbk9Qp1cT
// 205. STAND-N4DeBhQHgI9it0ynGzWY
// 206. STAND-T3JL2jY0DHl1PvU5KmiX
// 207. STAND-XBOFSqapCld2mxMPWgY3
// 208. STAND-a7NQwFuLVKbHs9Dpi0mM
// 209. STAND-fHySDXjp6dzAulmU2R3q
// 210. STAND-lJf9bHEuNzWg5AS6Yhpm
// 211. STAND-qgPK36e9DbjITJ0NW2ou
// 212. STAND-xeHSQclP9BL3YbF1v

// Tji
// 213. STAND-10v49QqnduVJSEgocf3W
// 214. STAND-3CTb7JfHdE2oapM9Ksv6
// 215. STAND-6W7p3DBV0eFOL4QhHSyN
// 216. STAND-9nHfFDIV2eU8twos4Bp6
// 217. STAND-EX8TYayevJq35ZWU6iOw
// 218. STAND-KJF8QmecVuIHkWwCgszn
// 219. STAND-OQVRwzLiKxN1voj0W8Yc
// 220. STAND-T7gjZ8wdnqoFh4LXvS6l
// 221. STAND-XcbKvAz9E7g6GlZRO1Ti
// 222. STAND-agS6OkV1mHfZ5y0BdI2X
// 223. STAND-iX4fG2ycok8smvLJ1MrP
// 224. STAND-n8t1cT3bNmKZdXFR0v2J
// 225. STAND-s23DAcJk89oZzNBMFYg1
// 226. STAND-yAEoQZG8r2adW6nJXt3j
// 227. STAND-1M0h74lS3OyPemtb8BuR
// 228. STAND-4CikRwprHLqnybEcPSJA
// 229. STAND-6ZdxVWf0cykpOq5eAmJR
// 230. STAND-9Ul6tgrfO3C4QLPjxnyT
// 231. STAND-E9KoqJycghBFwvYT3eXz
// 232. STAND-J8v4RQbTHi3FZuUOzmpW
// 233. STAND-Odb9g8i1a6mEhjRX30Vq
// 234. STAND-TA0pB6Zc5w7rNvIyDsEG
// 235. STAND-XxJsNRTBCYFrP6nkHld1
// 236. STAND-adwVQLZXsj4EelY9tP3o
// 237. STAND-h3M9zvxrfD1KAXgINw4L
// 238. STAND-letBxd7yLNzYr32HGvq9
// 239. STAND-qmNk7PiC1gnjfGJ0z9Vl
// 240. STAND-xPwQYK3Vae5sjm4pZNz6
// 241. STAND-13mQJNl8KtkMiyIHv5ob
// 242. STAND-4FISk1pXLdVgUz0jDCwq
// 243. STAND-6ZN0ld7T1nLcKS53wm8v
// 244. STAND-9p8vMDaZX2wLtKk5ilJ0
// 245. STAND-EACOyLeJ5rPfM3nsjv0d
// 246. STAND-KkAL76lBrJfCpR2giI3t
// 247. STAND-OjCF7GKDnHQVXkyET9wB
// 248. STAND-Tg7Hqmf6RKYleV2bLNWc
// 249. STAND-XRebDOJPwHgKmu61F8Lh
// 250. STAND-anbcJzTd6RpXIlx8gehw
// 251. STAND-fC2Mq8XzJgHs0vSNn9FK
// 252. STAND-j61TZadN24HJ5clD9w8s
// 253. STAND-oyTlbYQeqI6JhkPW8zm0
// 254. STAND-vfUJqR2h7dSueNzXlE9p
// 255. STAND-1H2Wp4ZjYbS67E8dO5rM
// 256. STAND-4IcZJ8zryvthgG5lTVds
// 257. STAND-6TJPh2Xn9mt5RYbNlKuc
// 258. STAND-9K4urzdHnMq0BL3pJwxI
// 259. STAND-FKICyjJtWrp2kxTeq5Eg
// 260. STAND-McnF2p6qfy7RxYHS8zak
// 261. STAND-Sf8JclF3A56DZErXy0mq
// 262. STAND-XvlMpZKk5fY0tT7g98BU
// 263. STAND-bi2D0Pf8R1Jz6Twdn4lE
// 264. STAND-fpWLkNwD5h3tUgz0lm6T
// 265. STAND-kEP3Ujn0bNyAeWgBzV5R
// 266. STAND-pKPLCNAoD9O74giWwIjl
// 267. STAND-uu8gxBfCK7oWjpHnEZ34
// 268. STAND-0dX5FtJqPiLTnHGv4B6V
// 269. STAND-4Xp5HmBnItK7kZ2WfwA3
// 270. STAND-9sT0VB2l7SqHd1D6Cm5K
// 271. STAND-G2PvYDnwCkepJS3Xi0W5
// 272. STAND-JKf8lWzoZQFV7gUbsi5M
// 273. STAND-OV6ejn0cJdKqGWFvshDr
// 274. STAND-T6Ok1UHJiDxsfz35MwXc
// 275. STAND-XAyd4pjtDeH02T8SYVkR
// 276. STAND-aO39v4bX5eyQH7fmjJ6N
// 277. STAND-fvr9Bl2TqXZpzgWcjCJL
// 278. STAND-ky0gL2cHxP6MZTmXWf4V
// 279. STAND-r3EvDl7XK0tR5kpGqw4n
// 280. STAND-w8Ylrvt1Bz0ujS5X2y3x
// 281. STAND-0rPcftg6HZ7zE3JKG4Ai
// 282. STAND-4VLt9jGzXZdJOMqPynku
// 283. STAND-7D6WxRZlFuIhJbTVAv24


// 284. STAND-9U5ZQK2E0X3gRpzG8jLJ
// 285. STAND-FlpJfCoyUr2cYdgRv5Qs
// 286. STAND-KRSo5WmUEdG6jc8xzNgl
// 287. STAND-QVtWYNbR1JmrZlD0c82d
// 288. STAND-UchXK94FA3O8M02eJDfV
// 289. STAND-XZGhkvq2jlM1w3rOpYN9
// 290. STAND-azZTXoSb7HgcAdL6e5ly
// 291. STAND-fQoHglWkvupjt9Z0ny7M
// 292. STAND-jKp2cqeJsUC1ONfzDyA0
// 293. STAND-pG53fPOWlXhLkIbQ6EN2
// 294. STAND-v8u2RT9VLi3Ck6KP4NwW
// 295. STAND-0n5x2W81hEqm6NcvVfPt
// 296. STAND-4lM3t2povkS1BjyDLfTi
// 297. STAND-7N91Zj6J3hcAQ0pumfFd
// 298. STAND-9Y6yq4HBNXRhK5fS7WdU
// 299. STAND-FlkRfYVAtBncU8eG56ud
// 300. STAND-LdxJ7zmrNwcGSRi4eHjA
// 301. STAND-QjSlV9Zq3e2Dt65LkAwo
// 302. STAND-UrOe7MxHkLyl9qcYwXaF
// 303. STAND-Yzfq94CA1pwXtukx0bK8
// 304. STAND-aC5Zqdkx6G0vYlSRht2H
// 305. STAND-fV6zAK4iYxtXBwH5u9OJ
// 306. STAND-jQJlpkZUw4gBvYqdf8nX
// 307. STAND-oIqNt34Vv29FYucCmRwK
// 308. STAND-wRLpCqWgYf2BKeXGm7v3
// 309. STAND-0wN9yrgDkaBvZxVl7OfK
// 310. STAND-51b2sUNx39zACXt4Jpyc
// 311. STAND-8AiEb6oV3qDRZfNHYc4y
// 312. STAND-D8FR1n6Uz2TSaOYpLd5j
// 313. STAND-Hzth5I4RDLpeU7fmX89Q
// 314. STAND-LFntA7QzkXh8vpC4YS0s
// 315. STAND-QqlIKeZ7ThfogV8xEkAw
// 316. STAND-V1JYx8oMfWc59uR3QgZi
// 317. STAND-Z94fdLKXlqyhGmcOEBwN
// 318. STAND-aKPpH78ZfDk5TwbsnOm3
// 319. STAND-fXoD1xFjLWS0J4ugGpNt
// 320. STAND-k6KvcJ0B59tS12N3yLoq
// 321. STAND-nGHf5ebvzutlI8XOocwj
// 322. STAND-rHQJVm2Tq8NxB0FwS3pc
// 323. STAND-ySEZJG2z6pI8tcKmhT3X
// 324. STAND-1P70o8KdJqgE5DZIMuHX
// 325. STAND-4G3ofEK5YImPZSbUuAVj
// 326. STAND-7mtaTGgV9oqNnCpE3b5c
// 327. STAND-9VfvSyNTk7pA3ztcnDjl
// 328. STAND-DctVjKpZy74BFgEUMw0x
// 329. STAND-IOqc4V9vWnwXfjrlZ7sa
// 330. STAND-LFp5gsVNxU2T7l9zAioe
// 331. STAND-Qy3oHsbUkXnhZ0lt6R7M
// 332. STAND-VWs98dIq1phj6RAUFx03
// 333. STAND-ZfQJLCjGvNlXU1Yg7ytW
// 334. STAND-ad2sKkXLH0pWjYwP98Uf
// 335. STAND-hEHLz0mPdJwXeAr9T1j3
// 336. STAND-kOPJ9w1uq2MhR5Gfnb8s
// 337. STAND-o5hIzRn3Dqa4WVJ2lBpE
// 338. STAND-tgs5aYo7KnXe8Lvqj9QO
// 339. STAND-14zKXGNQ6F0rpvHgtuP9
// 340. STAND-53zX18GkTpquN69oBwmc
// 341. STAND-7QpT2oDw45x0s3ZyY1Wf
// 342. STAND-9Y8O0xtWeR5Q2jwSPfCl
// 343. STAND-DPAiWctuUZ2Vyz3N07gs
// 344. STAND-IanCJcBTjKZLQfywXplg
// 345. STAND-M69kvN3ecWYK8uO1Rfhp
// 346. STAND-SlqwdD2YoyLJNUjHZ4te
// 347. STAND-WfYpLJwzDxXhKRTrmuHb
// 348. STAND-ZaUBgjvt06z5rRFVHmY3
// 349. STAND-b0dEFHzukLON4iqGS1Pv
// 350. STAND-fkFhTYcmOp9o4UeL51RG
// 351. STAND-m1uV7TnK9fwcRp4vY0GI
// 352. STAND-q2KyWtJ8pRZ6hzsElv3N
// 353. STAND-vh8z6rKk1oQ5lBCwFbTf
// 354. STAND-17H8FZG0pRkYgVmnKqit


// 355. STAND-58LZDpsaKc3xqB1v7gYy
// 356. STAND-7Rhym0kDITfXYpZKu6J2
// 357. STAND-9dUpFIK6rqhNkTbM3Hg2
// 358. STAND-DvucIBFwxtJjgZaWl7q8
// 359. STAND-Ijg2k3qnW8MXcd1ouYLS
// 360. STAND-NwJ5KLhkoU0aRfFDXgZ4
// 361. STAND-QzKTs7kYDi5c9AjJVPGN
// 362. STAND-WpxcGbnJqsM5K73RYEz9
// 363. STAND-Z5d8CJXlN3t1mbKBFuq0
// 364. STAND-bFgIeN6x3HzvLJlXuw7o
// 365. STAND-gK1pyNvBqmsjTXH8F2li
// 366. STAND-mX46uFbt3NfzZsRCqEhB
// 367. STAND-q5kFvIjSzAPtGprlL0TW
// 368. STAND-wXvFOcyTR4lK1ZqY2sUJ
// 369. STAND-1IeNjlD90GQqzXs5KkPr
// 370. STAND-4PqZ7ANvX6UruYOzRtkB
// 371. STAND-7Vy36U5t8hN1qIKjZ2dC
// 372. STAND-9kFYapmJQ3u5N6CbHRE8
// 373. STAND-E0lYv3eQU7AaPOxB2dZp
// 374. STAND-IrBXjPq12omQ5uwfyz03
// 375. STAND-N6KUQXHbEzVO9g8cRtAd
// 376. STAND-RcgXQj8WIfBtH5zdNMTJ
// 377. STAND-XxM3iDkF1rZewc5AnmPh
// 378. STAND-aYJzLiDHR6KXCgN3rq0F
// 379. STAND-gtN2Wyk4sJv3XzGnQb8T
// 380. STAND-m9pL47EzBj1JArGoFgTq
// 381. STAND-r3MnSP9YUfzeGgRQK2o5
// 382. STAND-z88BJTXfU54mOWr9ZleL
// 383. STAND-1Ju6Kt2X3z5D7sZnbg8d
// 384. STAND-4T9zjDyaPcUZbI0VqSNo
// 385. STAND-7aBfrc3YjWSl8dDw0Lo9
// 386. STAND-9yPTx2iSNkmrFZJ1b8Kh
// 387. STAND-E9dymrjkfc0UqQt1KX6z
// 388. STAND-Iuu86XPbg5GwNlnafLD2
// 389. STAND-NI7zFwHKV4n6W5mMlPbg
// 390. STAND-RqTDEh7f52Uy6AZWznXV
// 391. STAND-XyspTV4tuBxEkGjMRc8z
// 392. STAND-bK3p2FntkXHidzhEwGmN
// 393. STAND-hTqUoLc4umkAgXwPK2Bz
// 394. STAND-mqug9jwhlzTBAF6LJItS
// 395. STAND-r2k3gfVMXOKqzFwtQ5E7
// 396. STAND-z9dXiQJF6O58Kecwblut
// 397. STAND-1M4WJwKT2YtZfGcgmDoE
// 398. STAND-4WiDj9v1q5XfHe3NsRpZ
// 399. STAND-7YrMw2aPjuL4TbNQ3KVq
// 400. STAND-9FjANo1zBbVeY4GlTQWE
// 401. STAND-ElTjBXc4Pd7Y5RKQmhaw
// 402. STAND-J1tUo3FqJhZxG8Kg9i6Y
// 403. STAND-OSuxGKfT7ehPNvaDmylM
// 404. STAND-Wl53LRGi6bISAYkFDxWd
// 405. STAND-ZIizOyQUrMewvJkp9xXa
// 406. STAND-bY75UfMD3QSe6zINsWg0
// 407. STAND-iFpR20uOKATJ37Ebv8dg
// 408. STAND-m05pl32cszYVQ8H7U4jW
// 409. STAND-rlfIzawJX3c9tYyN4k0R
// 410. STAND-3AsouHZcWkdG81PxOrTl
// 411. STAND-54OLnA6HWXJKC1Ua8eFm
// 412. STAND-7aLZEHAmNr3XfMyg1B8d
// 413. STAND-9Toczi7Q3mtqEwKy6eNu
// 414. STAND-EeG4VKnTlmFt1s5XW8vM
// 415. STAND-I9hBptzln6F2rdYoDk4L
// 416. STAND-NATj2c0gdfVnPTxplSi6
// 417. STAND-R4ah3ezLoUun7xK2ISXs
// 418. STAND-XReWJq1yKLz0c8CAuBNd
// 419. STAND-bj10pN8v5yQSKCJsaeg3
// 420. STAND-ht8Gz1XiJVvWHEBqoU5r
// 421. STAND-m6c2gkt41Jx98hU0bZyr
// 422. STAND-rAQZ5U3XBzKdygRpt7e0
// 423. STAND-34XlSY8k2rJpG7vaZF3g
// 424. STAND-5PX6kJr7zoYNfdwtcHus
// 425. STAND-7ikdYp1oq8QcSgrxU24F
// 426. STAN-9yE6Zcdq8zuomrhB0pnK
// 427. STAND-EjYt8a6OheHk5KG3T9Vb
// 428. STAND-IJcZTbj7Gz5lH3kaFmOp
// 429. STAND-NLRZUJYVvpFctbMzs7i8
// 430. STAND-RD8hrQaYGXfxm2S3piMw
// 431. STAND-XZf2l63krPtQNYxji90g
// 432. STAND-bpY8LhtWsNZ4zMgEjX7S
// 433. STAND-iS97OJxD5jLmwnzQ3u4a
// 434. STAND-nE6QRCUY4Wtmh9i2FOd1
// 435. STAND-sKpejHB0RZdArxw1yGvT
// 436. STAND-6LygBxPZc7v9u5lWzQpU
// 437. STAND-9GmEvwp1vKRikOyjx5Yl
// 438. STAND-FB4mwPQyXczWe2l6VTxd
// 439. STAND-JK4OyRcF2Xg0Hlsw1I6B
// 440. STAND-P4oTkzZyCQd0i3Wg8AE1
// 441. STAND-U6IaoLBGnsQdzF7i4w8M
// 442. STAND-Zn2Tpk7wKX1JqIflYbOE
// 443. STAND-cI2MDpQkHZgEsh4wvnau
// 444. STAND-hs9kbtjQUM5o2SDpLl3a
// 445. STAND-m7iXNn1WogJYy52se8cL
// 446. STAND-r2iM4Q1cnvUKO83Zkt9E
// 447. STAND-3RxKnMfdD1gbwqZ2HoV5
// 448. STAND-5Q0Hid3RZoum6KrgXswb
// 449. STAND-7yXzkNtJveaE9dhLqPju
// 450. STAND-9JEOLG7PNKvX2MSkxjRD
// 451. STAND-FH7PKEWuzVwXTdgOqo4r
// 452. STAND-JPeoYRUZCgrd0j6iWk2B
// 453. STAND-QzUf6yckTKX37eD8HhVq
// 454. STAND-URQG8abKqHY4s9TnvAp0
// 455. STAND-ZwKLEPTCmOHAyJf6xUR2
// 456. STAND-cRg2VAnJtqFHj1lk0XsI
// 457. STAND-jrl0eVLQ7wJnNucy6Y5z
// 458. STAND-o9WcYljp6gkf5vUNJFIZ
// 459. STAND-4t17JIlr2vXAN3OghpMS
// 460. STAND-0x7NV3SYcnJtE2sRPr8B
// 461. STAND-2GwcyF9Qp4jKXx0lE7LP
// 462. STAND-5w3S4FQhDGMnYPlcx2RA
// 463. STAND-87KUZp3at4NlL2OHkqoJ
// 464. STAND-CxiVqITwL0ROUEtD76Wm
// 465. STAND-JvcRAUTM7h1fq9YF4XyP
// 466. STAND-QhKWLYwDmlGVUjT9ieOr
// 467. STAND-UVC9k6gSl2wq3mjJXoyp
// 468. STAND-ZhK3oWGlum5r69pU0DxP
// 469. STAND-cZqyg6vAu57BKpmVW3Nl
// 470. STAND-k2eh0ANB3YfG6JgE1Ko9
// 471. STAND-oE7dRPA0Mgfwz2qc6tkI
// 472. STAND-4OTZ5JNqmkYzWjF6vGIX
// 473. STAND-0fKHSJxkOV8aZzqGt9cQ
// 474. STAND-2H0jpETgM6Wkv17cDFtZ
// 475. STAND-5aApDsf4Zlm8NvUGJ3L0
// 476. STAND-8AhWdOLZpwV7SsF5vjtf
// 477. STAND-CAf5XYQnmP7ewRUZJ6ir
// 478. STAND-LjE85YWTmFNHA0cBKdrw
// 479. STAND-ONe4R3zyCgGSBWavkdXK
// 480. STAND-TAsziHw0RkvJcGNy7B4q
// 481. STAND-ZqALBDKaptrc8l76d1Xf
// 482. STAND-cZDJj9SAnKwT5NfBOsuR
// 483. STAND-kEGBnS1fwjUZQyrui6z3
// 484. STAND-p2AF0ChNqVsx4XJkKY7n
// 485. STAND-3vMQ9tcrdYwG5JlfiKjT
// 486. STAND-6aFu5vbDEnKPfBXjAyJt
// 487. STAND-8DKIRVPkOc1STgJ7mMjF
// 488. STAND-CRwyg4zvnXr7PSHaV3qA
// 489. STAND-N3I68TXfvDczkO4pgmKe
// 490. STAND-QWvOo2zp6jXgqZ3uHBN5
// 491. STAND-UT9XMJczgGy5nfCQeYlb
// 492. STAND-ZX34k1tDxVjJIE6iopwm
// 493. STAND-cpWXna2CjIl7Aos0bOT9
// 494. STAND-kWmTLhRfnE35ctAdS8Iu
// 495. STAND-p5oht3if2a4Kl7rDZ0wX
// 496. STAND-3WQytlYc6gHJN0jnLVu5
// 497. STAND-6f4tpZiyNQSJEuwj1Y

// Vc
// 498. STAND-8Iq70hTdfjPBbHJvG6Kp
// 499. STAND-DKQzRf4btHY3pSwn6iIc
// 500. STAND-L4lqIEgG3nXu1yJkdOa9
// 501. STAND-R6ALfiV9nrKa2ldpNtEz
// 502. STAND-ZPvt82kdN3TljoVHm4A0
// 503. STAND-cT9Dmy1AMHwevUu4rYkF
// 504. STAND-iaxslNd9nrwqoFZk8fKJ
// 505. STAND-lH2UekbmzBqWLK1nwa0f
// 506. STAND-s0OkCzbRlw4JhNDrX9Ft
// 507. STAND-3ez4aIsDOKYVXF0ukq7P
// 508. STAND-6xZv3ADlONP2Qpju1YgK
// 509. STAND-8p4zV6a9ET3NKw2yQKcO
// 510. STAND-E1gJofpA0mT7xcM35NYH
// 511. STAND-LJUEC3HGlKxyIW7SkrBv
// 512. STAND-RVX9vktm4QbFOoyz83Yp
// 513. STAND-ZTfy6Smw0p7sP2nXJ4l9
// 514. STAND-cdaZVZSlbj3pDwX8M1BQ
// 515. STAND-jDwIz7qJUme3LF0tE9Cv
// 516. STAND-n7by9YQWk2H6e0Z8FJ1r
// 517. STAND-ssHfg0q5ZztEDxRP6n2e
// 518. STAND-3EoLZmfY7kNJR5v2dSQ1
// 519. STAND-6zOWVNTYt8wn4QJ1KBcM
// 520. STAND-8X23jz0WS5dcLUhVq1TR
// 521. STAND-E4ZY3WfuT6qbX1klL82N
// 522. STAND-LMDNfRslrPn5pJ1KkO8S
// 523. STAND-SJvpTNiX3Ld4u1Zc7Q6O
// 524. STAND-ZbIfWKEONvzs7xRw0P1p
// 525. STAND-cmsvPzq2jD7Gk9h3uIyU
// 526. STAND-jJbE3gr9vTIxKdCN4mHo
// 527. STAND-oi9UZ3kJBYKdG2rMlTFg
// 528. STAND-3GTBdSmx6qczkYrjXIZF
// 529. STAND-6CfzpQXWBD4jw2e17vmq
// 530. STAND-8fO7nIGlBzQ4S6pJVdjm
// 531. STAND-EaaTFW8Vc0nzdqfsb5tX
// 532. STAND-LUyQMrj4FwqlHgYIKpSA
// 533. STAND-TldVwCAHOjpWJYi7XK0u
// 534. STAND-Zv4MqrJxjcY0EILHSen3
// 535. STAND-d3HAgfblSzoR6cZr0IVX
// 536. STAND-jaZ8kMwl7HKnJz2mPuJX
// 537. STAND-pi3wj0v8CZhtKN4bfoTE
// 538. STAND-4GoZFgNmx1qBh8Wwp3cv
// 539. STAND-0U3Pogq4k7tiNmZJE6fb
// 540. STAND-1GjVtx8gZnW5FhvTfqXJ
// 541. STAND-3c7Moktz05XGJrBQ4jTn
// 542. STAND-6iGJIs4Wn9ujcy8zFqxE
// 543. STAND-8haJ24xBGyFnHqK5mWoY
// 544. STAND-EfIxdctzZwjTGkpvP2Y7
// 545. STAND-LNPgtw94FBWZ5hC8eqrJ
// 546. STAND-TpON8dP7cr1iw6m2eGxv
// 547. STAND-ZxBVaj1MKh5DqfQIdp6S
// 548. STAND-dW5QcLzAJYnC3tS4b1UT
// 549. STAND-j8E4ktNF1DqRoS9VZ73s
// 550. STAND-pmS64F0GzufJvwBPhW8k
// 551. STAND-4H6Ek5vLYijOlBTuzJto
// 552. STAND-0zCnPtAHj8Xl3N9QwfoO
// 553. STAND-2kcMWfvdDp3EJgKHLsYl
// 554. STAND-6MLQHR3qPA7tukOzi0G9
// 555. STAND-8nG1vqoQ3ImlcLB0JwxN
// 556. STAND-EyFdD5cZ3qhVMj8gJ9lN
// 557. STAND-LB48RmoZQJwn7Az9kFiM
// 558. STAND-TSg9tjhBqyWaUuY6Xp4x
// 559. STAND-ZRbJdlkc0a5mHvW9n4Vz
// 560. STAND-dx1mUBgktvF8wPL2TnAi
// 561. STAND-jAAeK9IHZyY45tNvx87m
// 562. STAND-pSRhE3qOno2jwTY4bNaG
// 563. STAND-4Jv5e1A8dYqkDhZnLcSN
// 564. STAND-12qClFOTGm3xKi0XWPAn
// 565. STAND-4NB8PdLaVos7ThiwMqJc
// 566. STAND-4NyPIt7afXELUp9zKh20
// 567. STAND-7CeMWkp2fVJZosatcAv9
// 568. STAND-AZ5bm6cgpNKjy4PXlw81
// 569. STAND-BkeI0rSdXcjUzO2q5mgy
// 570. STAND-Dm4lFszLIq9Voh2S3Y7x
// 571. STAND-ECx2X8W5ogb7K4sAyGNt
// 572. STAND-HlnGfuhMyRkvC9ZIejwz
// 573. STAND-K9avYlDcX5C3Ir8E1FNz
// 574. STAND-MPegNhLZiKac3xYVHnB1
// 575. STAND-Q5LFsNV3l9wBz8jrJGTR
// 576. STAND-QeLS0F7ci82VBoXfJtZH
// 577. STAND-SAGNuekiZ4zLmYk1chUd
// 578. STAND-TuLjB75dF8vNSnyUk3cG
// 579. STAND-UNQG9ZiLnOYo07jKYb2p
// 580. STAND-WTUMHkGbNt9C61dxYXn8
// 581. STAND-Y9qn6VbuJTt4QNLZivr8
// 582. STAND-ZtwpBs9c67oyEeWl1qgS
// 583. STAND-aMvYghuKzprGjfQH50ET
// 584. STAND-dInYb9Uk5rPKq2FcSlpL
// 585. STAND-iHqQ5nm8Fz4woaLckT1K
// 586. STAND-lI7c8wW5x1q2yXbTArZN
// 587. STAND-pTKc5xvzRUWfqeyDil8Y
// 588. STAND-ryOh5vGqZcj7Fp0AaRIK
// 589. STAND-3CbKGRoVet5YQIsPzajJ
// 590. STAND-3NxEiYqL1FhazD5UpJXT
// 591. STAND-6tGUswKazLC4QDdj7Anr
// 592. STAND-9kHeWbXJuplZ47tjCPYR
// 593. STAND-C4qSJhUf8F6G1TQgApoj
// 594. STAND-GVzrsZaLcYnqjh8XWtKw
// 595. STAND-K8SQHdRPJwNvaLtEhUeT
// 596. STAND-MQ0bXv3mkWne52YFI4NR
// 597. STAND-SEzN5aykFxf4iGdq6A87
// 598. STAND-VbkjlMJ8tpr3qCZyWd5i
// 599. STAND-ZWovqH7YUjDcVzApRlkL
// 600. STAND-bxai4y2vl6ZGTUOQpSkt
// 601. STAND-fzC5oNtmK8Lx9b1UHM4l
// 602. STAND-kJGlZ8O3t6P45NjyYdWm
// 603. STAND-pTy0nEv3KbqGUwWw5MxN
// 604. STAND-tgNlJZpBwcz7Ffxq2dHr
// 605. STAND-x2UYfOCGcP8jSnZb7o0Q
// 606. STAND-1Of89kYxNlpJw2yV0P4Z
// 607. STAND-4NcjlqgvEdGwMKZhVnDo
// 608. STAND-4kLQzbgtYR6epm3A50M7
// 609. STAND-6p0Jz1i8Vk2cvqLWlKYX
// 610. STAND-9G3T7rgx5boEhsK1kczN
// 611. STAND-D6c9w4QgGljA8JTXB1dm
// 612. STAND-I2QNZjFJb3UMc8zV5plA
// 613. STAND-LrY9e3IodK5cB2Pmluj4
// 614. STAND-RWajLc37u4XJN8EbFZgI
// 615. STAND-Uw7BdWbqNRK0sVr6TZo5
// 616. STAND-YEikpJP49Zo3cfmTxRuy
// 617. STAND-aXz8FeLnS3Df7bmNcB6H
// 618. STAND-gElKr0PX9nuqjM5dFc3W
// 619. STAND-kWQvXeVBgFwSdm6hzcRA
// 620. STAND-p5SD9yiwvGmzclW2AFtr
// 621. STAND-tR7N3oJ4f6xdBziWZ8pV
// 622. STAND-yZkVgCwoY0Fz6KB8JsE1
// 623. STAND-3YvVQd0KxmWoLJiZ4nTP
// 624. STAND-6MC1R8y9HrN3k0oagz4F
// 625. STAND-8ic45GkYJ2ZT6spLXMAj
// 626. STAND-D6MvfqJs1wGgWnXzua9r
// 627. STAND-I5UjVtM9dfl4eXr6zwYm
// 628. STAND-Lx3V2DSgB8ZwP4c6bTve
// 629. STAND-RdhcsxZ9fGmey4EiCAJ6
// 630. STAND-WdhZT8iJpY7EbXgOlf6c
// 631. STAND-ZPvAeKmXo4cJtW7k6dI5
// 632. STAND-ajMvUgw86ncDYW1Q2Fol
// 633. STAND-h5Zt60r1uR7KmXjIkJgD
// 634. STAND-0CbUEIucJ9eqkLnyx8jF
// 635. STAND-28uRZ9vk0HmD4Wz1fTLy
// 636. STAND-5Lm0IBlDrJ2yGn4szckh
// 637. STAND-8PymQtoWZS1HX6vzYfUc
// 638. STAND-DoYwdFag4Q7zv9buMpiK
// 639. STAND-HZuRhVb7zqD8TJF2Ijc
// 640. STAND-MsP3rbWd4bILYyS2i5vK
// 641. STAND-QI9XLOh75VkBjzNma3R4
// 642. STAND-T35Yj1mWA8IeSGpLdshK
// 643. STAND-Y49I6wmNKcMtPe8VBnQT
// 644. STAND-bTXC3I2yON5Goc9lwK6J
// 645. STAND-g9ovQzq1sF4yRmMKt3Wc
// 646. STAND-kXQe5Vb7UsG9CHhJL4lz
// 647. STAND-p9BLmMENYRyF0WiZujc5
// 648. STAND-uFYcl5Sv2J1TXbeLrdjI
// 649. STAND-2Cg85lNA7mYjfdPFiXBK
// 650. STAND-1cVY8x5SbvawpKjT0uJe
// 651. STAND-4RgPuXYC7qlkJ5G3adTf
// 652. STAND-76DwXtb9rfmq3Hn1zUkW
// 653. STAND-CFI7R3gHNtDKWxSkhmwM
// 654. STAND-JbAjcm5Qo3hXzg4r7pN1
// 655. STAND-MuXh4aGeFjzD2nT0WZl5
// 656. STAND-QTK9brY5ePIqSzEaCJw3
// 657. STAND-T0acVrihE5xgNp9qYL2Z
// 658. STAND-YXFcZekap1yPmL5Qg9Nv
// 659. STAND-d9T6LNPvJcOXRq7EYiVg
// 660. STAND-igJy7eRcZ1H0tp4bTq9M
// 661. STAND-oDnVC5YpNkhRjFIJb9Bd
// 662. STAND-4VvXiUOzw6SkeZbGtMEr
// 663. STAND-9xIHa75BfsY0Jm3ZvSGc
// 664. STAND-C89tSe3P5rgXa0JQmdY6
// 665. STAND-JGy8qVNtZu5MK7zsi29j
// 666. STAND-N5CKdmG3Q9JiHXwr2Yhs
// 667. STAND-QYyHtMFbThnvacpAdi3o
// 668. STAND-TnPOw7kM84F1jyRq0EJx
// 669. STAND-YVhznX5SbtG8AIxjL4OT
// 670. STAND-df9kI0NSZuy8CehKcJoP
// 671. STAND-it7HaOcDpLmNVwYzk8Xx
// 672. STAND-oURvJ83qz25YEkSby7Ac
// 673. STAND-4WXvzg7GcBmeKHLkZ3sU
// 674. STAND-9gOjIzGyQJZt6Prh4wfq
// 675. STAND-CAsyXR0UqlPft3w45iV1
// 676. STAND-JM5mwUGu8DyPx1jnkbRh
// 677. STAND-N91XJ4wWLyITZSvapzYo
// 678. STAND-Rk3oQbNnV9TCJg5s0Y6W
// 679. STAND-UxEwa2lqi1KptHvzZcb9
// 680. STAND-ZgPVFeGkA85HT2JW7rbI
// 681. STAND-bUuzKPkfvFGyZxjNw3QJ
// 682. STAND-hfWJXAgNkC5dIpTz8uFE
// 683. STAND-lE9DHeJtqM7Gup0hXjnC
// 684. STAND-q0VY5gDpi6ex8HRPmFon
// 685. STAND-tA9jwB2b4cTix6RkPvn8
// 686. STAND-ynbFDqgV4cYTmS6ZKpXe
// 687. STAND-3C9KBiQvz8ysU0rjha2g
// 688. STAND-6vK4s5zmwPFRYxQec3fg
// 689. STAND-9xHeL3VwqG2U0PoKISnc
// 690. STAND-Dhc7RoGKzXFpAeWmL3Yb
// 691. STAND-IG3JtqV1HnKdwaWLfZoN
// 692. STAND-NMpvw6K5lkL0O3oAbJZt
// 693. STAND-QTVWqOr9zU34XHm5ctuK
// 694. STAND-TXZCqpmP9aFotugJV1db
// 695. STAND-ZJ8uWm0aKdnzvf6NehYr
// 696. STAND-cYITwv38tKoUWzfp70R2
// 697. STAND-icF9lgU7XMJ1QSK5aZCz
// 698. STAND-m8eUw3qbYvaKrtBPLHkF
// 699. STAND-s9nXCb65VIG2MJpwFetD
// 700. STAND-xJqDmOt2C9g1zprE3jLc
// 701. STAND-1DQxSHzOeg0Lra6cVBY9
// 702. STAND-4ahUEs1yrxq0Pd8bLzRW
// 703. STAND-5DwRbHtqPvS7cX02OeJT